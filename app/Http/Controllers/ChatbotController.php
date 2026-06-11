<?php

namespace App\Http\Controllers;

use App\Mail\AdminEnquiryReceived;
use App\Mail\ClientEnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class ChatbotController extends Controller
{
    public function ai(Request $request)
    {
        $data = $request->validate([
            'message' => ['nullable', 'string', 'max:2000'],
            'reset' => ['nullable', 'boolean'],
        ]);

        if (!empty($data['reset'])) {
            $request->session()->forget([
                'chatbot.step',
                'chatbot.answers',
                'chatbot.complete',
            ]);

            return response()->json(['success' => true, 'ai_message' => 'Chatbot session reset.']);
        }

        $userMessage = trim((string) ($data['message'] ?? ''));
        $step = (int) $request->session()->get('chatbot.step', 0);
        $answers = (array) $request->session()->get('chatbot.answers', []);

        $response = [
            'success' => true,
            'ai_message' => '',
            'chatbot_complete' => false,
        ];

        if ($step === 0 && $userMessage === '') {
            $response['ai_message'] = "Hello! Welcome to " . config('app.name') . ". What do you need help with?";
            $response['options'] = [
                'Astrology Query',
                'Horoscope',
                'Gemstone',
                'Panditji Booking',
                'Vastu',
                'General Contact',
            ];
        } elseif ($step === 0) {
            $answers['Service'] = $userMessage;
            $step = 1;
            $response['ai_message'] = "Great! What's your name?";
        } elseif ($step === 1) {
            if (strlen($userMessage) < 2) {
                $response['ai_message'] = "Please share your name (at least 2 characters).";
            } else {
                $answers['Name'] = $userMessage;
                $step = 2;
                $response['ai_message'] = "Thanks, {$answers['Name']}! What's your email address?";
            }
        } elseif ($step === 2) {
            if (!filter_var($userMessage, FILTER_VALIDATE_EMAIL)) {
                $response['ai_message'] = "That doesn't look like a valid email address. Please enter a correct email address.";
            } else {
                $answers['Email'] = $userMessage;
                $step = 3;
                $response['ai_message'] = "Got it. What's your phone number with country code?";
            }
        } elseif ($step === 3) {
            if ($userMessage === '' || !preg_match('/^\\+?[0-9\\s\\-()]{7,20}$/', $userMessage)) {
                $response['ai_message'] = "Please enter a valid phone number with country code.";
            } else {
                $answers['Phone'] = $userMessage;
                $step = 4;
                $response['ai_message'] = "Please describe your requirement in a few lines.";
            }
        } elseif ($step === 4) {
            if (strlen($userMessage) < 5) {
                $response['ai_message'] = "Please add a bit more detail (at least 5 characters).";
            } else {
                $answers['Message'] = $userMessage;
                $step = 5;
                $response['ai_message'] = "Thank you! Submitting your request now.";
                $request->session()->put('chatbot.complete', true);
                $response['chatbot_complete'] = true;
            }
        } else {
            $response['ai_message'] = "I have collected all the necessary information. Thank you!";
            $response['chatbot_complete'] = (bool) $request->session()->get('chatbot.complete', false);
        }

        $request->session()->put('chatbot.step', $step);
        $request->session()->put('chatbot.answers', $answers);

        return response()->json($response);
    }

    public function submit(Request $request)
    {
        $answers = (array) $request->session()->get('chatbot.answers', []);
        $complete = (bool) $request->session()->get('chatbot.complete', false);

        if (!$complete || empty($answers)) {
            return response()->json(['success' => false, 'message' => 'Chatbot session not complete.'], 422);
        }

        $enquiry = Enquiry::create([
            'source' => 'chatbot',
            'context' => $answers['Service'] ?? null,
            'page_url' => $request->headers->get('referer'),
            'user_id' => $request->user()?->id && Schema::hasColumn('enquiries', 'user_id') ? $request->user()->id : null,
            'name' => $answers['Name'] ?? null,
            'email' => $answers['Email'] ?? null,
            'phone' => $answers['Phone'] ?? null,
            'subject' => $answers['Service'] ?? 'Chatbot',
            'message' => $answers['Message'] ?? null,
            'meta' => $answers,
            'ip' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
        ]);

        $adminEmail = config('enquiries.admin_email');
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new AdminEnquiryReceived($enquiry));
        }
        if (!empty($enquiry->email)) {
            Mail::to($enquiry->email)->send(new ClientEnquiryReceived($enquiry));
        }

        $request->session()->forget(['chatbot.step', 'chatbot.answers', 'chatbot.complete']);

        return response()->json(['success' => true]);
    }
}
