<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\EnquiryReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class EnquiriesController extends Controller
{
    public function show(Request $request, Enquiry $enquiry)
    {
        $this->authorizeEnquiry($request, $enquiry);

        $enquiry->load([
            'replies' => fn ($q) => $q->orderBy('created_at'),
            'replies.senderUser',
        ]);

        return view('frontend.account.enquiry_show', [
            'enquiry' => $enquiry,
        ]);
    }

    public function storeReply(Request $request, Enquiry $enquiry)
    {
        $this->authorizeEnquiry($request, $enquiry);

        $allowedMimes = [
            'image/jpeg',
            'image/png',
            'image/webp',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        $data = $request->validate([
            'body' => ['nullable', 'string', 'max:5000'],
            'attachment' => ['nullable', 'file', 'max:51200', 'mimetypes:' . implode(',', $allowedMimes)], // 50MB
        ]);

        $attachment = $request->file('attachment');

        if (!$data['body'] && !$attachment) {
            return back()->withErrors(['body' => 'Please add a message or attachment.'])->withInput();
        }

        $reply = new EnquiryReply();
        $reply->enquiry_id = $enquiry->id;
        $reply->sender_type = 'user';
        $reply->sender_user_id = $request->user()?->id;
        $reply->body = $data['body'] ?? null;

        if ($attachment) {
            $mime = $attachment->getMimeType();
            if (!$mime || !in_array($mime, $allowedMimes, true)) {
                return back()->withErrors(['attachment' => 'Invalid file type.'])->withInput();
            }

            $disk = 'public';
            $path = $attachment->storePublicly("enquiries/{$enquiry->id}", $disk);

            $reply->attachment_disk = $disk;
            $reply->attachment_path = $path;
            $reply->attachment_original_name = $attachment->getClientOriginalName();
            $reply->attachment_mime = $mime;
            $reply->attachment_size = $attachment->getSize();
        }

        $reply->save();

        return redirect()->route('account.enquiries.show', $enquiry)->with('status', 'Reply sent.');
    }

    private function authorizeEnquiry(Request $request, Enquiry $enquiry): void
    {
        $user = $request->user();
        $userId = $user?->id;
        $email = strtolower((string) ($user?->email ?? ''));

        if (
            $userId &&
            Schema::hasColumn('enquiries', 'user_id') &&
            (int) ($enquiry->user_id ?? 0) === (int) $userId
        ) {
            return;
        }

        if ($email && strtolower((string) ($enquiry->email ?? '')) === $email) {
            return;
        }

        if (!$email) {
            abort(403);
        }
    }
}
