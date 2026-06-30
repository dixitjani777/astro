<?php

namespace App\Http\Controllers;

use App\Mail\AdminEnquiryReceived;
use App\Mail\ClientEnquiryReceived;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        if ($this->isBlockedSubmitter($request)) {
            return back()->withErrors(['form' => 'This account is blocked and cannot submit new enquiries.'])->withInput();
        }

        $data = $request->validate($this->rulesForSource($request->string('source')->toString()));
        $attachments = $request->file('attachments', []);
        if (!is_array($attachments)) {
            $attachments = $attachments ? [$attachments] : [];
        }

        $meta = (array) ($data['meta'] ?? []);
        unset($data['meta'], $data['attachments']);

        $user = $request->user();
        if ($user) {
            if (Schema::hasColumn('enquiries', 'user_id')) {
                $data['user_id'] = $user->id;
            }
            $data['email'] = $data['email'] ?? $user->email;
            $data['phone'] = $data['phone'] ?? $user->mobile;
            $data['name'] = $data['name'] ?? $user->name;
        }

        $enquiry = Enquiry::create([
            ...$data,
            'meta' => $meta,
            'ip' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
        ]);

        if (!empty($attachments)) {
            $storedAttachments = [];

            foreach ($attachments as $attachment) {
                if (!$attachment) {
                    continue;
                }

                $path = $attachment->storePublicly("enquiries/{$enquiry->id}/attachments", 'public');
                $storedAttachments[] = [
                    'path' => $path,
                    'original_name' => $attachment->getClientOriginalName(),
                    'mime' => $attachment->getMimeType(),
                    'size' => $attachment->getSize(),
                ];
            }

            if (!empty($storedAttachments)) {
                $meta['attachments'] = $storedAttachments;
                $enquiry->meta = $meta;
                $enquiry->save();
            }
        }

        $adminEmail = config('enquiries.admin_email');
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new AdminEnquiryReceived($enquiry));
        }

        if (!empty($enquiry->email)) {
            Mail::to($enquiry->email)->send(new ClientEnquiryReceived($enquiry));
        }

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return back()->with('status', 'Thanks! We received your enquiry.');
    }

    private function isBlockedSubmitter(Request $request): bool
    {
        $user = $request->user();
        if ($user?->isBlocked()) {
            return true;
        }

        $email = strtolower(trim((string) $request->input('email', '')));
        $phone = trim((string) $request->input('phone', ''));

        if ($email !== '' && User::query()->whereRaw('LOWER(email) = ?', [$email])->where('is_blocked', true)->exists()) {
            return true;
        }

        if ($phone !== '' && User::query()->where('mobile', $phone)->where('is_blocked', true)->exists()) {
            return true;
        }

        return false;
    }

    private function rulesForSource(string $source): array
    {
        $rules = [
            'source' => ['nullable', 'string', 'max:100'],
            'context' => ['nullable', 'string', 'max:150'],
            'page_url' => ['nullable', 'string', 'max:2048'],
            'name' => ['nullable', 'string', 'max:150'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['nullable', 'string', 'max:5000'],
            'meta' => ['nullable', 'array'],
            'meta.consent' => ['accepted'],
            'attachments' => ['nullable', 'array', 'max:5'],
            'attachments.*' => ['file', 'max:10240', 'mimetypes:image/jpeg,image/png,image/webp,image/gif,application/pdf'],
        ];

        return match (strtolower($source)) {
            'query' => array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'message' => ['required', 'string', 'max:5000'],
                'meta' => ['required', 'array'],
                'meta.gender' => ['required', 'string', 'in:male,female,other'],
                'meta.dob_time' => ['required', 'string', 'max:100'],
                'meta.birth_place' => ['required', 'string', 'max:255'],
            ]),
            'feedback' => array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'message' => ['required', 'string', 'max:5000'],
                'meta' => ['required', 'array'],
                'meta.gender' => ['required', 'string', 'in:male,female'],
                'meta.dob_time' => ['required', 'string', 'max:100'],
                'meta.birth_place' => ['required', 'string', 'max:255'],
            ]),
            'astrologer' => array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'message' => ['required', 'string', 'max:5000'],
                'meta' => ['required', 'array'],
                'meta.gender' => ['required', 'string', 'in:male,female,other'],
                'meta.dob_time' => ['required', 'string', 'max:100'],
                'meta.birth_place' => ['required', 'string', 'max:255'],
                'meta.preferred_datetime' => ['required', 'string', 'max:100'],
                'meta.consultation_type' => ['required', 'string', 'in:call,video,face_to_face'],
                'meta.language' => ['required', 'string', 'in:hi,en,gu'],
            ]),
            'report' => array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'message' => ['required', 'string', 'max:5000'],
                'meta' => ['required', 'array'],
                'meta.gender' => ['required', 'string', 'in:male,female,other'],
                'meta.dob_time' => ['required', 'string', 'max:100'],
                'meta.birth_place' => ['required', 'string', 'max:255'],
            ]),
            'gemstone' => array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'message' => ['required', 'string', 'max:5000'],
                'meta' => ['required', 'array'],
                'meta.gender' => ['required', 'string', 'in:male,female,other'],
                'meta.dob_time' => ['required', 'string', 'max:100'],
                'meta.birth_place' => ['required', 'string', 'max:255'],
                'meta.expected_gemstone' => ['required', 'string', 'in:blue_sapphire,ruby,emerald,pearl,red_coral,yellow_sapphire,diamond,hessonite,cats_eye'],
                'meta.carat_weight' => ['required', 'string', 'in:below_3,3_5,5_7,7_9,9_plus'],
            ]),
            'pandit' => array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'message' => ['required', 'string', 'max:5000'],
                'meta' => ['required', 'array'],
                'meta.location_type' => ['required', 'string', 'in:pandit_place,my_place,online_e_puja'],
                'meta.location' => ['required', 'string', 'max:255'],
                'meta.desired_datetime' => ['required', 'string', 'max:100'],
                'meta.prayer_service' => ['required', 'string', 'in:puja_service,hawan_service,jaap_shanti_pujas,katha,other'],
                'meta.subcategory' => ['required', 'string', 'in:puja_service,hawan_service,jaap_shanti_pujas,katha,other'],
            ]),
            'vastu' => array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'message' => ['required', 'string', 'max:5000'],
                'meta' => ['required', 'array'],
                'meta.gender' => ['required', 'string', 'in:male,female'],
                'meta.dob_time' => ['required', 'string', 'max:100'],
                'meta.birth_place' => ['required', 'string', 'max:255'],
                'meta.property_type' => ['required', 'string', 'in:apartment,bungalow,plot_land,shop,factory,workplace'],
                'meta.consultation_type' => ['required', 'string', 'in:visit,phone,video'],
                'meta.report_type' => ['required', 'string', 'in:basic,detail'],
            ]),
            default => $rules,
        };
    }
}
