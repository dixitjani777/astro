<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Enquiry Settings
    |--------------------------------------------------------------------------
    |
    | Central configuration for all enquiry-like forms (contact/query/feedback).
    | Forms should pass "source" / "context" fields to identify origin.
    |
    */

    'admin_email' => env('ENQUIRY_ADMIN_EMAIL', env('MAIL_FROM_ADDRESS')),
    'admin_name' => env('ENQUIRY_ADMIN_NAME', env('APP_NAME', 'Admin')),

    'client_reply_subject' => env('ENQUIRY_CLIENT_SUBJECT', 'We received your enquiry'),
];

