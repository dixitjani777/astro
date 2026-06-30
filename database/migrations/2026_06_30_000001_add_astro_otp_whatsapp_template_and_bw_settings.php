<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        DB::table('whatsapp_templates')->updateOrInsert(
            ['slug' => 'astro_otp'],
            [
                'name' => 'Astro OTP',
                'body_text' => 'Your {{site_name}} OTP is {{code}}. It expires in {{expires_minutes}} minutes.',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        foreach ([
            'whatsapp.enabled' => ['type' => 'bool', 'value' => '1'],
            'whatsapp.api_url' => ['type' => 'string', 'value' => ''],
            'whatsapp.api_token' => ['type' => 'string', 'value' => ''],
            'whatsapp.api_key' => ['type' => 'string', 'value' => ''],
            'whatsapp.timeout' => ['type' => 'number', 'value' => '20'],
            'whatsapp.sender' => ['type' => 'string', 'value' => ''],
            'whatsapp.default_country' => ['type' => 'string', 'value' => 'in'],
            'whatsapp.user' => ['type' => 'string', 'value' => ''],
            'whatsapp.pass' => ['type' => 'string', 'value' => ''],
        ] as $key => $data) {
            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                array_merge($data, ['updated_at' => $now, 'created_at' => $now])
            );
        }
    }

    public function down(): void
    {
        DB::table('whatsapp_templates')->where('slug', 'astro_otp')->delete();

        DB::table('settings')->whereIn('key', [
            'whatsapp.enabled',
            'whatsapp.api_url',
            'whatsapp.api_token',
            'whatsapp.api_key',
            'whatsapp.timeout',
            'whatsapp.sender',
            'whatsapp.default_country',
            'whatsapp.user',
            'whatsapp.pass',
        ])->delete();
    }
};
