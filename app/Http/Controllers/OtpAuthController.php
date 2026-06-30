<?php

namespace App\Http\Controllers;

use App\Mail\OtpCodeMail;
use App\Mail\RegistrationCompletedMail;
use App\Models\User;
use App\Services\WhatsAppService;
use App\Support\IpGeolocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OtpAuthController extends Controller
{
    private const OTP_TTL_SECONDS = 180;

    public function show()
    {
        return redirect('/account?mode=otp');
    }

    public function send(Request $request)
    {
        $purpose = strtolower((string) $request->input('purpose', 'login'));
        $purpose = in_array($purpose, ['login', 'register'], true) ? $purpose : 'login';

        $rules = [
            'purpose' => ['nullable', 'string', 'in:login,register'],
            'country_code' => ['nullable', 'string', 'max:8'],
        ];

        if ($purpose === 'register') {
            $rules = array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
                'mobile' => ['required', 'string', 'max:32', Rule::unique('users', 'mobile')],
                'mobile_raw' => ['nullable', 'string', 'max:32'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        } else {
            $rules = array_merge($rules, [
                'identifier' => ['required', 'string', 'max:255'],
            ]);
        }

        $data = $request->validate($rules);

        if ($purpose === 'register') {
            return $this->sendRegistrationOtp($request, $data);
        }

        return $this->sendLoginOtp($request, $data);
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

        $existing = User::query()->whereRaw('LOWER(email) = ?', [$email])->first();
        $countryCode = $this->normalizeCountryCode($request->session()->get('otp_country_code') ?? $request->input('country_code') ?? $existing?->country_code);
        $mobile = $request->session()->get('otp_mobile');

        if ($purpose === 'register') {
            if (User::query()->whereRaw('LOWER(email) = ?', [$email])->where('is_blocked', true)->exists()) {
                return back()->withErrors(['email' => 'This email is blocked. Please contact support.'])->withInput();
            }

            if ($mobile && User::query()->where('mobile', $mobile)->where('is_blocked', true)->exists()) {
                return back()->withErrors(['mobile' => 'This mobile number is blocked. Please contact support.'])->withInput();
            }

            if ($existing) {
                return back()->withErrors(['email' => 'An account already exists with this email. Please log in instead.'])->withInput();
            }

            $name = (string) ($request->session()->get('otp_name') ?: Str::before($email, '@'));
            $password = (string) ($request->session()->get('otp_password') ?: Str::random(32));

            $user = User::create([
                'email' => $email,
                'name' => $name,
                'mobile' => $mobile,
                'country_code' => $countryCode,
                'password' => $password,
                'email_verified_at' => now(),
                'mobile_verified_at' => $countryCode === 'in' && $mobile ? now() : null,
            ]);

            $wasRecentlyCreated = true;
        } else {
            $user = $existing;
            $wasRecentlyCreated = false;

            if (!$user) {
                return back()->withErrors(['email' => 'No account found with this email. Please register first.'])->withInput();
            }
        }

        if ($user->isAdmin()) {
            return redirect()->route('admin.login')->with('status', 'Please log in from the Admin panel.');
        }

        if ($user->isBlocked()) {
            return back()->withErrors(['email' => 'This account is blocked. Please contact support.'])->withInput();
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        if ($wasRecentlyCreated) {
            try {
                Mail::to($user->email)->send(new RegistrationCompletedMail($user));

                if ($user->country_code === 'in' && $user->mobile) {
                    app(WhatsAppService::class)->sendRegistrationWelcome($user);
                }
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
            'otp_country_code',
            'otp_identifier',
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

    private function sendLoginOtp(Request $request, array $data)
    {
        $identifier = strtolower(trim($data['identifier']));
        $user = $this->findUserByIdentifier($identifier);

        if (!$user) {
            return back()->withErrors(['identifier' => 'No account found with this email or mobile number. Please register first.'])->withInput();
        }

        if ($user->isBlocked()) {
            return back()->withErrors(['identifier' => 'This account is blocked. Please contact support.'])->withInput();
        }

        if ($user->isAdmin()) {
            return back()->withErrors(['identifier' => 'Admin accounts must log in from the Admin panel.'])->withInput();
        }

        $isMobileIdentifier = !$this->isEmail($identifier);
        $countryCode = $this->resolveCountryCode($request, $user, $identifier);

        if ($isMobileIdentifier && $countryCode !== 'in') {
            return back()->withErrors(['identifier' => 'NRI accounts should use email for OTP login.'])->withInput();
        }

        $code = (string) random_int(100000, 999999);
        Cache::put($this->otpCacheKey($user->email), [
            'hash' => Hash::make($code),
            'created_at' => now()->toIso8601String(),
        ], self::OTP_TTL_SECONDS);

        Mail::to($user->email)->send(new OtpCodeMail($code));

        $mobile = $isMobileIdentifier && $countryCode === 'in' ? ($user->mobile ?: null) : null;
        if ($mobile) {
            app(WhatsAppService::class)->sendOtp($mobile, $code, [
                'purpose' => 'login',
                'name' => $user->name,
                'email' => $user->email,
            ]);
        }

        $request->session()->put('otp_email', $user->email);
        $request->session()->put('otp_purpose', 'login');
        $request->session()->put('otp_name', $user->name);
        $request->session()->put('otp_mobile', $mobile);
        $request->session()->put('otp_country_code', $countryCode);
        $request->session()->put('otp_identifier', $identifier);

        $message = $mobile
            ? 'OTP sent to your email and mobile number. Please check both inboxes.'
            : 'OTP sent to your email. Please check your inbox.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'expires_in' => self::OTP_TTL_SECONDS,
                'email' => $user->email,
                'purpose' => 'login',
            ]);
        }

        return back()->with('status', $message);
    }

    private function sendRegistrationOtp(Request $request, array $data)
    {
        $email = strtolower(trim($data['email']));
        $mobile = $this->normalizeMobile($data['mobile'] ?? $data['mobile_raw'] ?? null);
        $countryCode = $this->resolveCountryCode($request);

        if (User::query()->whereRaw('LOWER(email) = ?', [$email])->exists()) {
            return back()->withErrors(['email' => 'An account already exists with this email. Please log in instead.'])->withInput();
        }

        if ($mobile && User::query()->where('mobile', $mobile)->exists()) {
            return back()->withErrors(['mobile' => 'An account already exists with this mobile number.'])->withInput();
        }

        $code = (string) random_int(100000, 999999);
        Cache::put($this->otpCacheKey($email), [
            'hash' => Hash::make($code),
            'created_at' => now()->toIso8601String(),
        ], self::OTP_TTL_SECONDS);

        Mail::to($email)->send(new OtpCodeMail($code));

        $sendToMobile = $countryCode === 'in' && $mobile;
        if ($sendToMobile) {
            app(WhatsAppService::class)->sendOtp($mobile, $code, [
                'purpose' => 'register',
                'name' => $data['name'] ?? '',
                'email' => $email,
            ]);
        }

        $request->session()->put('otp_email', $email);
        $request->session()->put('otp_purpose', 'register');
        $request->session()->put('otp_name', $data['name'] ?? null);
        $request->session()->put('otp_mobile', $mobile);
        $request->session()->put('otp_password', (string) ($data['password'] ?? ''));
        $request->session()->put('otp_country_code', $countryCode);

        $message = $sendToMobile
            ? 'OTP sent to your email and mobile number. Please check both inboxes.'
            : 'OTP sent to your email. Please check your inbox.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'expires_in' => self::OTP_TTL_SECONDS,
                'email' => $email,
                'purpose' => 'register',
            ]);
        }

        return back()->with('status', $message);
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

    private function normalizeCountryCode(mixed $countryCode): string
    {
        $countryCode = strtolower(trim((string) $countryCode));

        if ($countryCode === '') {
            return 'in';
        }

        return substr($countryCode, 0, 2);
    }

    private function resolveCountryCode(Request $request, ?User $user = null, ?string $identifier = null): string
    {
        if ($user?->country_code) {
            return $this->normalizeCountryCode($user->country_code);
        }

        $sessionCountry = $this->normalizeCountryCode($request->session()->get('otp_country_code'));
        if ($sessionCountry !== 'in' || $request->session()->has('otp_country_code')) {
            return $sessionCountry;
        }

        $inputCountry = $this->normalizeCountryCode($request->input('country_code'));
        if ($inputCountry !== 'in' || $request->filled('country_code')) {
            return $inputCountry;
        }

        $mobile = $this->normalizeMobile($identifier);
        if ($mobile && Str::startsWith($mobile, '+91')) {
            return 'in';
        }

        if ($mobile && $user?->mobile && Str::startsWith($user->mobile, '+91')) {
            return 'in';
        }

        $geo = IpGeolocation::lookup($request->ip());
        $geoCountry = strtolower(trim((string) ($geo['country'] ?? '')));
        if ($geoCountry === 'india') {
            return 'in';
        }

        return 'in';
    }

    private function findUserByIdentifier(string $identifier): ?User
    {
        $identifier = trim($identifier);
        if ($identifier === '') {
            return null;
        }

        if ($this->isEmail($identifier)) {
            return User::query()->whereRaw('LOWER(email) = ?', [Str::lower($identifier)])->first();
        }

        $candidates = $this->mobileLookupCandidates($identifier);
        if (empty($candidates)) {
            return null;
        }

        foreach ($candidates as $mobile) {
            $user = User::query()->where('mobile', $mobile)->first();
            if ($user) {
                return $user;
            }
        }

        return null;
    }

    private function mobileLookupCandidates(string $identifier): array
    {
        $mobile = $this->normalizeMobile($identifier);
        if (!$mobile) {
            return [];
        }

        $candidates = [$mobile];

        if (!Str::startsWith($mobile, '+') && preg_match('/^\d{10}$/', $mobile)) {
            $candidates[] = '+91' . $mobile;
        }

        return array_values(array_unique($candidates));
    }

    private function isEmail(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function otpCacheKey(string $email): string
    {
        return 'otp:email:' . Str::lower(trim($email));
    }
}
