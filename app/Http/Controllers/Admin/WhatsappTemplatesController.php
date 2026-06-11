<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatsappTemplate;
use Illuminate\Http\Request;

class WhatsappTemplatesController extends Controller
{
    public function index()
    {
        return view('admin.whatsapp-templates.index', [
            'templates' => WhatsappTemplate::query()->orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.whatsapp-templates.form', [
            'template' => new WhatsappTemplate(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['required', 'string', 'max:120', 'unique:whatsapp_templates,slug'],
            'body_text' => ['nullable', 'string', 'max:5000'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        WhatsappTemplate::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'body_text' => $data['body_text'] ?? null,
            'is_active' => (bool) ($data['is_active'] ?? false),
        ]);

        return redirect()->route('admin.whatsapp-templates.index')->with('status', 'WhatsApp template created.');
    }

    public function edit(WhatsappTemplate $whatsapp_template)
    {
        return view('admin.whatsapp-templates.form', [
            'template' => $whatsapp_template,
        ]);
    }

    public function update(Request $request, WhatsappTemplate $whatsapp_template)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['required', 'string', 'max:120', 'unique:whatsapp_templates,slug,' . $whatsapp_template->id],
            'body_text' => ['nullable', 'string', 'max:5000'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $whatsapp_template->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'body_text' => $data['body_text'] ?? null,
            'is_active' => (bool) ($data['is_active'] ?? false),
        ]);

        return redirect()->route('admin.whatsapp-templates.edit', $whatsapp_template)->with('status', 'WhatsApp template updated.');
    }

    public function destroy(WhatsappTemplate $whatsapp_template)
    {
        $whatsapp_template->delete();

        return redirect()->route('admin.whatsapp-templates.index')->with('status', 'WhatsApp template deleted.');
    }
}
