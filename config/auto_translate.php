<?php

return [
    'enabled' => env('AUTO_TRANSLATE_ENABLED', true),

    // Default language of site content.
    'source_locale' => env('AUTO_TRANSLATE_SOURCE_LOCALE', 'en'),

    // Supported locales in the language dropdown.
    'locales' => [
        'en' => 'English',
        'hi' => 'Hindi',
        'gu' => 'Gujarati',
    ],

    // Cookie name storing chosen language.
    'cookie' => env('AUTO_TRANSLATE_COOKIE', 'site_lang'),

    // Translation provider
    // Supported: openai
    'provider' => env('AUTO_TRANSLATE_PROVIDER', 'openai'),

    // OpenAI settings (Approach 2)
    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'model' => env('OPENAI_TRANSLATE_MODEL', 'gpt-5'),
        'endpoint' => env('OPENAI_RESPONSES_ENDPOINT', 'https://api.openai.com/v1/responses'),
        'timeout' => (int) env('OPENAI_TRANSLATE_TIMEOUT', 30),
    ],

    // Safety/perf
    'max_nodes' => (int) env('AUTO_TRANSLATE_MAX_NODES', 1200),
    'max_text_len' => (int) env('AUTO_TRANSLATE_MAX_TEXT_LEN', 300),
    'batch_size' => (int) env('AUTO_TRANSLATE_BATCH_SIZE', 25),
];

