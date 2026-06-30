<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
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

        return back()->withErrors([
            'body' => 'Free query replies are disabled here. Please book a paid consultation for follow-up questions.',
        ]);
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
