<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\EnquiryReply;
use App\Support\IpGeolocation;
use Illuminate\Http\Request;

class EnquiriesController extends Controller
{
    public function index(Request $request)
    {
        $query = Enquiry::query()->latest();

        if ($request->filled('id')) {
            $query->where('id', (int) $request->input('id'));
        }

        if ($request->filled('source')) {
            $query->where('source', $request->string('source'));
        }

        if ($request->filled('name')) {
            $name = $request->string('name');
            $query->where('name', 'like', "%{$name}%");
        }

        if ($request->filled('email')) {
            $email = $request->string('email');
            $query->where('email', 'like', "%{$email}%");
        }

        if ($request->filled('phone')) {
            $phone = $request->string('phone');
            $query->where('phone', 'like', "%{$phone}%");
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date('date_from'));
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date('date_to'));
        }

        if ($request->string('export')->lower() === 'csv') {
            return response()->streamDownload(function () use ($query) {
                $out = fopen('php://output', 'w');
                // UTF-8 BOM for Excel
                fwrite($out, "\xEF\xBB\xBF");
                fputcsv($out, ['ID', 'Source', 'Context', 'Name', 'Email', 'Phone', 'Subject', 'Message', 'Page URL', 'Created At']);
                $query->chunk(500, function ($rows) use ($out) {
                    foreach ($rows as $e) {
                        fputcsv($out, [
                            $e->id,
                            $e->source,
                            $e->context,
                            $e->name,
                            $e->email,
                            $e->phone,
                            $e->subject,
                            $e->message,
                            $e->page_url,
                            optional($e->created_at)->toDateTimeString(),
                        ]);
                    }
                });
                fclose($out);
            }, 'enquiries.csv', ['Content-Type' => 'text/csv; charset=UTF-8']);
        }

        return view('admin.enquiries.index', [
            'enquiries' => $query->paginate(25)->withQueryString(),
        ]);
    }

    public function show(Enquiry $enquiry)
    {
        $enquiry->load([
            'user',
            'replies' => fn ($q) => $q->orderBy('created_at'),
            'replies.senderUser',
        ]);

        return view('admin.enquiries.show', [
            'enquiry' => $enquiry,
            'ipLocation' => IpGeolocation::lookup($enquiry->ip),
        ]);
    }

    public function storeReply(Request $request, Enquiry $enquiry)
    {
        $allowedMimes = [
            // images (for user-like replies too)
            'image/jpeg',
            'image/png',
            'image/webp',
            // docs
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            // audio
            'audio/mpeg',
            'audio/wav',
            'audio/webm',
            'audio/mp4',
            'audio/x-m4a',
            // video
            'video/mp4',
            'video/webm',
            'video/quicktime',
        ];

        $data = $request->validate([
            'body' => ['nullable', 'string', 'max:5000'],
            'payment_url' => ['nullable', 'url', 'max:2000'],
            'attachment' => ['nullable', 'file', 'max:51200', 'mimetypes:' . implode(',', $allowedMimes)], // 50MB
        ]);

        $attachment = $request->file('attachment');

        if (!$data['body'] && !$data['payment_url'] && !$attachment) {
            return back()->withErrors(['body' => 'Please add a message, payment link, or attachment.'])->withInput();
        }

        $reply = new EnquiryReply();
        $reply->enquiry_id = $enquiry->id;
        $reply->sender_type = 'admin';
        $reply->sender_user_id = $request->user()?->id;
        $reply->body = $data['body'] ?? null;
        $reply->payment_url = $data['payment_url'] ?? null;

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

        return redirect()->route('admin.enquiries.show', $enquiry)->with('status', 'Reply sent.');
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->route('admin.enquiries.index')->with('status', 'Enquiry deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        Enquiry::query()->whereIn('id', $data['ids'])->get()->each->delete();
        return redirect()->route('admin.enquiries.index')->with('status', 'Selected enquiries deleted.');
    }
}
