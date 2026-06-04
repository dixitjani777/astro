<?php

return [
    // Microsoft Entra ID (Azure AD) tenant id (GUID) or tenant domain.
    'tenant_id' => env('MSGRAPH_TENANT_ID'),

    // App Registration client id/secret (client credentials flow).
    'client_id' => env('MSGRAPH_CLIENT_ID'),
    'client_secret' => env('MSGRAPH_CLIENT_SECRET'),

    // Comma-separated list of allowed mailboxes (UPNs) to read, e.g. "po@domain.com,ponarang@domain.com"
    'mailboxes' => env('MSGRAPH_MAILBOXES', ''),
];

