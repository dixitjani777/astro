<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatsappLog;
use Illuminate\Http\Request;

class WhatsappLogsController extends Controller
{
    public function index(Request $request)
    {
        $query = WhatsappLog::query()
            ->with(['user', 'enquiry', 'enquiryReply'])
            ->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('template_slug')) {
            $query->where('template_slug', $request->string('template_slug'));
        }

        if ($request->filled('recipient')) {
            $recipient = $request->string('recipient');
            $query->where('recipient', 'like', "%{$recipient}%");
        }

        return view('admin.whatsapp-logs.index', [
            'logs' => $query->paginate(50)->withQueryString(),
        ]);
    }

    public function show(WhatsappLog $whatsapp_log)
    {
        $whatsapp_log->load(['user', 'enquiry', 'enquiryReply']);

        return view('admin.whatsapp-logs.show', [
            'log' => $whatsapp_log,
        ]);
    }
}
