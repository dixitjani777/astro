<?php

namespace App\Http\Controllers;

use App\Mail\OtpCodeMail;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Schema;

class Account extends Controller
{
    public function index(){
        if (auth()->check()) {
            if (auth()->user()?->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect('/myaccount/querystatus');
        }

    	return view('frontend/account/login_register', [
            'loginMode' => request('mode') === 'otp' ? 'otp' : 'password',
        ]);
	}

    public function loginWithPassword(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $email = strtolower($data['email']);

        $remember = (bool) ($data['remember'] ?? false);
        if (Auth::attempt(['email' => $email, 'password' => $data['password']], $remember)) {
            $request->session()->regenerate();

            if (auth()->user()?->isAdmin()) {
                Auth::logout();
                return back()->withErrors(['email' => 'Admin accounts must log in from the Admin panel.'])->withInput();
            }

            return redirect('/myaccount/querystatus')->with('status', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

	public function forgotpassword(){
    	return view('frontend/account/forgot_password');
	}

	public function loginwithotp(){
    	return redirect('/account?mode=otp');
	}

    public function querystatus(){
        return $this->renderEnquiryHistoryPage(
            'Request Status',
            'All requests and replies in one place',
        );
	}

	public function report(){
        return $this->renderEnquiryHistoryPage(
            'Horoscope Reports',
            'Track horoscope report requests and admin replies',
            fn ($q) => $this->applyInquiryFilter($q, 'report')
        );
	}

	public function astrologerbooking(){
        return $this->renderEnquiryHistoryPage(
            'Astrologer Bookings',
            'Track astrologer booking requests and replies',
            fn ($q) => $this->applyInquiryFilter($q, 'astrologer')
        );
	}

	public function gemstonesuggestion(){
        return $this->renderEnquiryHistoryPage(
            'Gemstone Recommendations',
            'Track gemstone recommendation requests and replies',
            fn ($q) => $this->applyInquiryFilter($q, 'gemstone')
        );
	}

	public function bookpanditJi(){
        return $this->renderEnquiryHistoryPage(
            'Panditji Bookings',
            'Track pandit booking requests and replies',
            fn ($q) => $this->applyInquiryFilter($q, 'pandit')
        );
	}

	public function vastu_specific(){
        return $this->renderEnquiryHistoryPage(
            'Vastu & Specific Queries',
            'Track Vastu and specific consultation requests',
            fn ($q) => $this->applyInquiryFilter($q, 'vastu')
        );
	}

    public function orders(){
        return $this->renderEnquiryHistoryPage(
            'My Orders',
            'Order-related enquiries and updates',
            fn ($q) => $q->where(function ($query) {
                $query->where('context', 'like', '%order%')
                    ->orWhere('subject', 'like', '%order%')
                    ->orWhere('source', 'like', '%order%');
            })
        );
	}

	public function setting(){
    	return view('frontend/account/settings_dynamic', [
            'user' => request()->user(),
        ]);
	}

    public function updateSettings(Request $request)
    {
        $user = $request->user();

        $request->merge([
            'mobile' => $this->normalizeMobile($request->input('mobile') ?: $request->input('mobile_raw')),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'mobile' => ['nullable', 'string', 'max:32', 'regex:/^\+\d{6,20}$/'],
            'mobile_raw' => ['nullable', 'string', 'max:32'],
            'dob' => ['nullable', 'date'],
            'location' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:120'],
            'city' => ['nullable', 'string', 'max:120'],
            'pincode' => ['nullable', 'string', 'max:20'],
        ]);

        $user->update($data);

        return back()->with('status', 'Account updated.');
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'current_password' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $otpVerified = (bool) $request->session()->get('settings_password_otp_verified_at');

        if (!$otpVerified && ! Hash::check((string) ($data['current_password'] ?? ''), $user->password ?? '')) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update(['password' => Hash::make($data['password'])]);
        $request->session()->forget('settings_password_otp_verified_at');

        return back()->with('status', 'Password updated.');
    }

    public function sendPasswordOtp(Request $request)
    {
        $user = $request->user();

        if (!$user?->email) {
            return back()->withErrors(['email' => 'No email address is available on your account.']);
        }

        $code = (string) random_int(100000, 999999);

        Cache::put($this->settingsPasswordOtpCacheKey($user->id), [
            'hash' => Hash::make($code),
            'created_at' => now()->toIso8601String(),
        ], 600);

        Mail::to($user->email)->send(new OtpCodeMail($code));

        return back()->with('status', 'OTP sent to your email address.');
    }

    public function verifyPasswordOtp(Request $request)
    {
        $data = $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $user = $request->user();
        $payload = Cache::get($this->settingsPasswordOtpCacheKey($user->id));

        if (!$payload || empty($payload['hash']) || ! Hash::check($data['otp'], $payload['hash'])) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP. Please request a new code.'])->withInput();
        }

        Cache::forget($this->settingsPasswordOtpCacheKey($user->id));
        $request->session()->put('settings_password_otp_verified_at', now()->toIso8601String());

        return back()->with('status', 'OTP verified. You can now update your password without entering the current password.');
    }

    public function sendPasswordResetLink(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $status = Password::sendResetLink(['email' => $data['email']]);

        return back()->with(
            $status === Password::RESET_LINK_SENT ? 'status' : 'error',
            __($status)
        );
    }

    public function showResetForm(string $token)
    {
        return view('frontend/account/reset_password', [
            'token' => $token,
            'email' => request('email'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $status = Password::reset(
            $data,
            function ($user) use ($data) {
                $user->forceFill([
                    'password' => Hash::make($data['password']),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect('/account')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
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

    private function renderEnquiryHistoryPage(string $title, string $subtitle, ?callable $scope = null)
    {
        $enquiries = $this->baseEnquiryQuery($scope)
            ->latest()
            ->paginate(15);

        return view('frontend.account.enquiries_page', [
            'pageTitle' => $title,
            'pageSubtitle' => $subtitle,
            'enquiries' => $enquiries,
        ]);
    }

    private function baseEnquiryQuery(?callable $scope = null)
    {
        $user = request()->user();
        $email = $user?->email;
        $userId = $user?->id;
        $hasUserIdColumn = Schema::hasColumn('enquiries', 'user_id');

        $query = Enquiry::query()
            ->with([
                'latestReply',
                'replies' => fn ($q) => $q->orderBy('created_at'),
                'replies.senderUser',
            ])
            ->when($userId || $email, function ($q) use ($userId, $email, $hasUserIdColumn) {
                $q->where(function ($q) use ($userId, $email, $hasUserIdColumn) {
                    if ($userId && $hasUserIdColumn) {
                        $q->where('user_id', $userId);
                    }
                    if ($email) {
                        $q->orWhere('email', $email);
                    }
                });
            });
        if ($scope) {
            $scope($query);
        }

        return $query;
    }

    private function applyInquiryFilter($query, string $match)
    {
        $query->where(function ($q) use ($match) {
            $q->where('context', 'like', "%{$match}%")
                ->orWhere('subject', 'like', "%{$match}%")
                ->orWhere('source', 'like', "%{$match}%");
        });
    }

    private function settingsPasswordOtpCacheKey(int|string $userId): string
    {
        return 'settings-password-otp:' . $userId;
    }
}
