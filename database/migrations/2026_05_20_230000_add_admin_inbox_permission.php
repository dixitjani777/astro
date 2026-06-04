<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (!DB::getSchemaBuilder()->hasTable('permissions')) {
            return;
        }

        $now = now();
        $key = 'admin.inbox';

        DB::table('permissions')->updateOrInsert(
            ['key' => $key],
            ['name' => 'Email Inbox', 'group' => 'Admin', 'created_at' => $now, 'updated_at' => $now]
        );

        if (!DB::getSchemaBuilder()->hasTable('roles') || !DB::getSchemaBuilder()->hasTable('permission_role')) {
            return;
        }

        $permissionId = DB::table('permissions')->where('key', $key)->value('id');
        if (!$permissionId) {
            return;
        }

        $roleId = DB::table('roles')->where('slug', 'admin')->value('id');
        if (!$roleId) {
            return;
        }

        DB::table('permission_role')->updateOrInsert(
            ['permission_id' => $permissionId, 'role_id' => $roleId],
            ['created_at' => $now, 'updated_at' => $now]
        );
    }

    public function down(): void
    {
        if (!DB::getSchemaBuilder()->hasTable('permissions')) {
            return;
        }

        DB::table('permissions')->where('key', 'admin.inbox')->delete();
    }
};

