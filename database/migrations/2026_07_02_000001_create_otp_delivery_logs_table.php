<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otp_delivery_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('purpose', 20)->index(); // login|register
            $table->string('channel', 20)->index(); // email|whatsapp
            $table->string('recipient')->nullable();
            $table->string('template_slug')->nullable();
            $table->string('status', 20)->default('pending');
            $table->longText('message_text')->nullable();
            $table->json('request_payload')->nullable();
            $table->json('response_payload')->nullable();
            $table->longText('error_message')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();

            $table->index(['purpose', 'channel', 'status']);
            $table->index(['recipient', 'created_at']);
        });

        $now = now();
        DB::table('permissions')->updateOrInsert(
            ['key' => 'admin.otp_delivery_logs'],
            ['name' => 'OTP Delivery Logs', 'group' => 'System', 'created_at' => $now, 'updated_at' => $now]
        );

        $adminRoleId = DB::table('roles')->where('slug', 'admin')->value('id');
        $permissionId = DB::table('permissions')->where('key', 'admin.otp_delivery_logs')->value('id');
        if ($adminRoleId && $permissionId) {
            DB::table('permission_role')->updateOrInsert(
                ['permission_id' => $permissionId, 'role_id' => $adminRoleId],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('otp_delivery_logs')) {
            Schema::dropIfExists('otp_delivery_logs');
        }

        DB::table('permissions')->where('key', 'admin.otp_delivery_logs')->delete();
    }
};
