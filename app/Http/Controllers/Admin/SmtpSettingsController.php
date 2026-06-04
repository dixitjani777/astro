<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class SmtpSettingsController extends Controller
{
    public function edit()
    {
        $settings = Setting::whereIn('key', [
            'mail.mailer',
            'mail.host',
            'mail.port',
            'mail.username',
            'mail.password',
            'mail.encryption',
            'mail.from_address',
            'mail.from_name',
        ])->pluck('value', 'key')->toArray();

        return view('admin.smtp-settings', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'mailer' => ['required', 'string', 'max:50'],
            'host' => ['nullable', 'string', 'max:255'],
            'port' => ['nullable', 'integer', 'min:1', 'max:65535'],
            'username' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'max:255'],
            'encryption' => ['nullable', 'string', 'max:20'], // tls|ssl|null
            'from_address' => ['nullable', 'email', 'max:255'],
            'from_name' => ['nullable', 'string', 'max:255'],
        ]);

        $map = [
            'mail.mailer' => $data['mailer'],
            'mail.host' => $data['host'] ?? null,
            'mail.port' => $data['port'] ? (string) $data['port'] : null,
            'mail.username' => $data['username'] ?? null,
            'mail.password' => $data['password'] ?? null,
            'mail.encryption' => $data['encryption'] ?? null,
            'mail.from_address' => $data['from_address'] ?? null,
            'mail.from_name' => $data['from_name'] ?? null,
        ];

        foreach ($map as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['type' => $key === 'mail.port' ? 'number' : 'string', 'value' => $value]
            );
        }

        Cache::forget('settings.all');

        return redirect()->route('admin.smtp-settings.edit')->with('status', 'SMTP settings updated.');
    }

    public function test(Request $request)
    {
        $data = $request->validate([
            'to_email' => ['required', 'email', 'max:255'],
        ]);

        try {
            Mail::raw(
                "This is a test email from " . config('app.name') . " (" . now()->toDateTimeString() . ").",
                function ($message) use ($data) {
                    $message->to($data['to_email'])->subject('SMTP Test Email');
                }
            );
        } catch (\Throwable $e) {
            return back()->withErrors(['to_email' => 'Send failed: ' . $e->getMessage()]);
        }

        return back()->with('status', 'Test email sent. Please check inbox/spam.');
    }
}
