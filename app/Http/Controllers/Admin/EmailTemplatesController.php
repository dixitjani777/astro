<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplatesController extends Controller
{
    public function index()
    {
        return view('admin.email-templates.index', [
            'templates' => EmailTemplate::query()->orderBy('name')->get(),
        ]);
    }

    public function edit(EmailTemplate $email_template)
    {
        return view('admin.email-templates.form', [
            'template' => $email_template,
        ]);
    }

    public function update(Request $request, EmailTemplate $email_template)
    {
        $data = $request->validate([
            'subject' => ['nullable', 'string', 'max:200'],
            'body_html' => ['nullable', 'string', 'max:200000'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $email_template->update([
            'subject' => $data['subject'] ?? null,
            'body_html' => $data['body_html'] ?? null,
            'is_active' => (bool) ($data['is_active'] ?? false),
        ]);

        return redirect()
            ->route('admin.email-templates.edit', $email_template)
            ->with('status', 'Email template updated.');
    }
}
