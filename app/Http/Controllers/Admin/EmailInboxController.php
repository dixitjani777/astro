<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MicrosoftGraphMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmailInboxController extends Controller
{
    public function index(Request $request, MicrosoftGraphMailService $graph)
    {
        if (!$graph->configured()) {
            return view('admin.inbox.index', [
                'configured' => false,
                'mailboxes' => [],
                'mailbox' => null,
                'messages' => [],
                'next' => null,
                'error' => null,
            ]);
        }

        $mailboxes = $graph->mailboxes();
        $mailbox = (string) $request->query('mailbox', $mailboxes[0] ?? '');
        if ($mailbox === '' && count($mailboxes) > 0) {
            $mailbox = $mailboxes[0];
        }

        $data = $request->validate([
            'mailbox' => ['nullable', 'string', 'max:255'],
            'next' => ['nullable', 'string', 'max:4000'],
            'top' => ['nullable', 'integer', 'min:1', 'max:50'],
        ]);

        $nextLink = null;
        if (!empty($data['next'])) {
            $decoded = base64_decode(strtr($data['next'], '-_', '+/'), true);
            if (is_string($decoded) && Str::startsWith($decoded, 'https://graph.microsoft.com/')) {
                $nextLink = $decoded;
            }
        }

        $top = (int) ($data['top'] ?? 25);

        $payload = $graph->listInboxMessages($mailbox, $nextLink, $top);
        $messages = array_values(array_map(function (array $msg) use ($graph, $mailbox) {
            $attachmentCount = 0;
            if (!empty($msg['hasAttachments'])) {
                $attachmentsPayload = $graph->listAttachments($mailbox, (string) ($msg['id'] ?? ''));
                $attachments = $attachmentsPayload['value'] ?? [];
                $attachmentCount = is_array($attachments) ? count($attachments) : 0;
            }

            $categories = array_values(array_filter($msg['categories'] ?? [], fn ($category) => is_string($category) && $category !== ''));

            return array_merge($msg, [
                'attachmentCount' => $attachmentCount,
                'automationStatus' => count($categories) ? implode(', ', $categories) : 'Manual',
            ]);
        }, is_array($payload['value'] ?? null) ? $payload['value'] : []));
        $odataNext = $payload['@odata.nextLink'] ?? null;
        $next = is_string($odataNext) && $odataNext !== ''
            ? rtrim(strtr(base64_encode($odataNext), '+/', '-_'), '=')
            : null;

        return view('admin.inbox.index', [
            'configured' => true,
            'mailboxes' => $mailboxes,
            'mailbox' => $mailbox,
            'messages' => $messages,
            'next' => $next,
            'error' => null,
        ]);
    }

    public function show(Request $request, string $messageId, MicrosoftGraphMailService $graph)
    {
        if (!$graph->configured()) {
            abort(500, 'Microsoft Graph is not configured.');
        }

        $data = $request->validate([
            'mailbox' => ['required', 'string', 'max:255'],
        ]);

        $mailbox = (string) $data['mailbox'];

        $message = $graph->getMessage($mailbox, $messageId);
        $attachmentsPayload = $graph->listAttachments($mailbox, $messageId);
        $attachments = $attachmentsPayload['value'] ?? [];

        return view('admin.inbox.show', [
            'mailbox' => $mailbox,
            'message' => $message,
            'attachments' => is_array($attachments) ? $attachments : [],
        ]);
    }

    public function downloadAttachment(Request $request, string $messageId, string $attachmentId, MicrosoftGraphMailService $graph)
    {
        if (!$graph->configured()) {
            abort(500, 'Microsoft Graph is not configured.');
        }

        $data = $request->validate([
            'mailbox' => ['required', 'string', 'max:255'],
        ]);

        $mailbox = (string) $data['mailbox'];

        $attachment = $graph->getFileAttachment($mailbox, $messageId, $attachmentId);
        $odataType = (string) ($attachment['@odata.type'] ?? '');
        if ($odataType !== '#microsoft.graph.fileAttachment') {
            abort(400, 'Unsupported attachment type.');
        }

        $name = (string) ($attachment['name'] ?? 'attachment');
        $contentType = (string) ($attachment['contentType'] ?? 'application/octet-stream');
        $contentBytes = (string) ($attachment['contentBytes'] ?? '');
        if ($contentBytes === '') {
            abort(404);
        }

        $binary = base64_decode($contentBytes, true);
        if ($binary === false) {
            abort(502, 'Attachment content decode failed.');
        }

        return response($binary, 200, [
            'Content-Type' => $contentType,
            'Content-Disposition' => 'attachment; filename="' . addslashes($name) . '"',
        ]);
    }
}
