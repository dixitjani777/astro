<?php

namespace App\Http\Controllers;

use App\Mail\OtpCodeMail;
use App\Mail\RegistrationCompletedMail;
use App\Models\User;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OtpAuthController extends Controller
{
    private const OTP_TTL_SECONDS = 180; // 3 minutes

    public function show()
    {
        return redirect('/account?mode=otp');
    }

    public function send(Request $request)
    {
        $purpose = strtolower((string) $request->input('purpose', 'login'));
        $purpose = in_array($purpose, ['login', 'register'], true) ? $purpose : 'login';

        $rules = [
            'email' => ['required', 'email', 'max:255'],
            'purpose' => ['nullable', 'string', 'in:login,register'],
        ];

        if ($purpose === 'register') {
            $rules['name'] = ['required', 'string', 'max:150'];
            $rules['mobile'] = ['required', 'string', 'max:32', 'regex:/^\\+\\d{6,20}$/'];
            $rules['mobile_raw'] = ['nullable', 'string', 'max:32'];
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        $data = $request->validate($rules);

        $email = strtolower($data['email']);
        $existing = User::query()->where('email', $email)->first();

        if ($purpose === 'login' && !$existing) {
            return back()->withErrors(['email' => 'No account found with this email. Please register first.'])->withInput();
        }

        if ($existing && $existing->isAdmin()) {
            return back()->withErrors(['email' => 'Admin accounts must log in from the Admin panel.'])->withInput();
        }

        if ($purpose === 'register' && $existing) {
            return back()->withErrors(['email' => 'An account already exists with this email. Please log in instead.'])->withInput();
        }

        $code = (string) random_int(100000, 999999);

        Cache::put($this->otpCacheKey($email), [
            'hash' => Hash::make($code),
            'created_at' => now()->toIso8601String(),
        ], self::OTP_TTL_SECONDS);

        Mail::to($email)->send(new OtpCodeMail($code));

        $mobile = $this->normalizeMobile($data['mobile'] ?? $data['mobile_raw'] ?? null) ?: $existing?->mobile;
        if ($mobile) {
            app(WhatsAppService::class)->sendOtp($mobile, $code, [
                'purpose' => $purpose,
                'name' => $purpose === 'register' ? ($data['name'] ?? '') : ($existing?->name ?? ''),
                'email' => $email,
            ]);
        }

        $request->session()->put('otp_email', $email);
        $request->session()->put('otp_purpose', $purpose);
        $request->session()->put('otp_name', $purpose === 'register' ? ($data['name'] ?? null) : ($existing?->name ?? null));
        $request->session()->put('otp_mobile', $mobile);
        $request->session()->put('otp_password', $purpose === 'register' ? (string) ($data['password'] ?? '') : null);

        $message = $mobile
            ? 'OTP sent to your email and WhatsApp. Please check both inboxes.'
            : 'OTP sent to your email. Please check your inbox.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'expires_in' => self::OTP_TTL_SECONDS,
                'email' => $email,
                'purpose' => $purpose,
            ]);
        }

        return back()->with('status', $message);
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'otp' => ['required', 'digits:6'],
            'purpose' => ['nullable', 'string', 'in:login,register'],
        ]);

        $email = strtolower($data['email']);
        $purpose = strtolower((string) ($data['purpose'] ?? $request->session()->get('otp_purpose', 'login')));
        $purpose = in_array($purpose, ['login', 'register'], true) ? $purpose : 'login';
        $payload = Cache::get($this->otpCacheKey($email));

        if (!$payload || empty($payload['hash']) || !Hash::check($data['otp'], $payload['hash'])) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP. Please request a new OTP.'])->withInput();
        }

        Cache::forget($this->otpCacheKey($email));

        $existing = User::query()->where('email', $email)->first();
        $name = (string) ($request->session()->get('otp_name') ?: $existing?->name ?: Str::before($email, '@'));
        $mobile = $request->session()->get('otp_mobile');

        if ($purpose === 'register') {
            if ($existing) {
                return back()->withErrors(['email' => 'An account already exists with this email. Please log in instead.'])->withInput();
            }

            $user = User::create([
                'email' => $email,
                'name' => $name,
                'mobile' => $mobile,
                'password' => (string) ($request->session()->get('otp_password') ?: Str::random(32)),
            ]);
            $wasRecentlyCreated = true;
        } else {
            if (!$existing) {
                return back()->withErrors(['email' => 'No account found with this email. Please register first.'])->withInput();
            }

            $user = $existing;
            $wasRecentlyCreated = false;
        }

        if ($mobile && ! $user->mobile) {
            $user->forceFill(['mobile' => $mobile])->save();
        }

        if ($user->isAdmin()) {
            return redirect()->route('admin.login')->with('status', 'Please log in from the Admin panel.');
        }

        Auth::login($user, true);

        if ($wasRecentlyCreated) {
            try {
                Mail::to($user->email)->send(new RegistrationCompletedMail($user));
                app(WhatsAppService::class)->sendRegistrationWelcome($user);
            } catch (\Throwable $e) {
                report($e);
            }
        }

        $request->session()->forget([
            'otp_email',
            'otp_purpose',
            'otp_name',
            'otp_mobile',
            'otp_password',
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect_url' => url('/myaccount/querystatus'),
                'message' => 'Logged in successfully.',
                'purpose' => $purpose,
            ]);
        }

        return redirect('/myaccount/querystatus')->with('status', 'Logged in successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/account')->with('status', 'Logged out.');
    }

    private function otpCacheKey(string $email): string
    {
        return 'otp:email:' . $email;
    }

    private function normalizeMobile(?string $mobile): ?string
    {
        $mobile = trim((string) $mobile);

        if ($mobile === '') {
            return null;
        }

        $mobile = preg_replace('/[^\d+]/', '', $mobile);

        return $mobile !== '' ? $mobile : null;
    }
}
