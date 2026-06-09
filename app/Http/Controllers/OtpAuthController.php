<?php

namespace App\Http\Controllers;

use App\Mail\OtpCodeMail;
use App\Mail\RegistrationCompletedMail;
use App\Models\User;
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
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'name' => ['nullable', 'string', 'max:150'],
            'mobile' => ['nullable', 'string', 'max:32', 'regex:/^\\+\\d{6,20}$/'],
            'mobile_raw' => ['nullable', 'string', 'max:32'],
        ]);

        $email = strtolower($data['email']);

        // Admin users must use /admin/login (do not allow frontend OTP login).
        $existing = User::query()->where('email', $email)->first();
        if ($existing && $existing->isAdmin()) {
            return back()->withErrors(['email' => 'Admin accounts must log in from the Admin panel.'])->withInput();
        }

        $code = (string) random_int(100000, 999999);

        Cache::put($this->otpCacheKey($email), [
            'hash' => Hash::make($code),
            'created_at' => now()->toIso8601String(),
        ], self::OTP_TTL_SECONDS);

        Mail::to($email)->send(new OtpCodeMail($code));

        $mobile = $this->normalizeMobile($data['mobile'] ?? $data['mobile_raw'] ?? null);

        $request->session()->put('otp_email', $email);
        $request->session()->put('otp_name', $data['name'] ?? null);
        $request->session()->put('otp_mobile', $mobile);

        $message = 'OTP sent to your email. Please check your inbox.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'expires_in' => self::OTP_TTL_SECONDS,
                'email' => $email,
            ]);
        }

        return back()->with('status', $message);
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'otp' => ['required', 'digits:6'],
        ]);

        $email = strtolower($data['email']);
        $payload = Cache::get($this->otpCacheKey($email));

        if (!$payload || empty($payload['hash']) || !Hash::check($data['otp'], $payload['hash'])) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP. Please request a new OTP.'])->withInput();
        }

        Cache::forget($this->otpCacheKey($email));

        $name = (string) ($request->session()->get('otp_name') ?: Str::before($email, '@'));
        $mobile = $request->session()->get('otp_mobile');

        $user = User::firstOrCreate(
            ['email' => $email],
            ['name' => $name, 'mobile' => $mobile, 'password' => Hash::make(Str::random(32))]
        );
        $wasRecentlyCreated = $user->wasRecentlyCreated;

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
            } catch (\Throwable $e) {
                report($e);
            }
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect_url' => url('/myaccount/querystatus'),
                'message' => 'Logged in successfully.',
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
