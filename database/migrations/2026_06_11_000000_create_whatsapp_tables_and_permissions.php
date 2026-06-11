<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('whatsapp_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('body_text')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('whatsapp_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('enquiry_id')->nullable()->constrained('enquiries')->nullOnDelete();
            $table->foreignId('enquiry_reply_id')->nullable()->constrained('enquiry_replies')->nullOnDelete();
            $table->string('recipient')->nullable();
            $table->string('template_slug')->nullable();
            $table->longText('message_text')->nullable();
            $table->string('status', 20)->default('sent');
            $table->unsignedSmallInteger('http_status')->nullable();
            $table->json('request_payload')->nullable();
            $table->json('response_payload')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'template_slug']);
            $table->index(['recipient', 'created_at']);
        });

        $now = now();
        $permissions = [
            ['key' => 'admin.whatsapp', 'name' => 'WhatsApp Settings', 'group' => 'System'],
            ['key' => 'admin.whatsapp_templates', 'name' => 'WhatsApp Templates', 'group' => 'System'],
            ['key' => 'admin.whatsapp_logs', 'name' => 'WhatsApp Logs', 'group' => 'System'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->updateOrInsert(
                ['key' => $permission['key']],
                ['name' => $permission['name'], 'group' => $permission['group'], 'created_at' => $now, 'updated_at' => $now]
            );
        }

        $adminRoleId = DB::table('roles')->where('slug', 'admin')->value('id');
        if ($adminRoleId) {
            $permissionIds = DB::table('permissions')->whereIn('key', array_column($permissions, 'key'))->pluck('id');
            foreach ($permissionIds as $permissionId) {
                DB::table('permission_role')->updateOrInsert(
                    ['permission_id' => $permissionId, 'role_id' => $adminRoleId],
                    ['created_at' => $now, 'updated_at' => $now]
                );
            }
        }

        $templates = [
            [
                'name' => 'OTP Code',
                'slug' => 'otp-code',
                'body_text' => 'Your {{site_name}} OTP is {{code}}. It expires in {{expires_minutes}} minutes.',
            ],
            [
                'name' => 'Registration Complete',
                'slug' => 'registration-complete',
                'body_text' => 'Welcome {{name}}! Your account has been created successfully. Log in here: {{login_url}}',
            ],
            [
                'name' => 'Enquiry Reply',
                'slug' => 'enquiry-reply',
                'body_text' => '{{name}}, we have replied to your {{subject}} enquiry. {{reply_body}} {{payment_url}} {{attachment_url}}',
            ],
        ];

        foreach ($templates as $template) {
            DB::table('whatsapp_templates')->updateOrInsert(
                ['slug' => $template['slug']],
                [
                    'name' => $template['name'],
                    'body_text' => $template['body_text'],
                    'is_active' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('whatsapp_logs')) {
            Schema::dropIfExists('whatsapp_logs');
        }
        if (Schema::hasTable('whatsapp_templates')) {
            Schema::dropIfExists('whatsapp_templates');
        }

        DB::table('permissions')->whereIn('key', [
            'admin.whatsapp',
            'admin.whatsapp_templates',
            'admin.whatsapp_logs',
        ])->delete();
    }
};
