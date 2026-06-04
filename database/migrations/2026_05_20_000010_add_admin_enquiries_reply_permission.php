<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (
            !DB::getSchemaBuilder()->hasTable('roles') ||
            !DB::getSchemaBuilder()->hasTable('permissions') ||
            !DB::getSchemaBuilder()->hasTable('permission_role')
        ) {
            return;
        }

        $now = now();

        DB::table('permissions')->updateOrInsert(
            ['key' => 'admin.enquiries.reply'],
            [
                'name' => 'Enquiries (Reply)',
                'group' => 'Admin',
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );

        $permissionId = DB::table('permissions')->where('key', 'admin.enquiries.reply')->value('id');
        if (!$permissionId) {
            return;
        }

        // Admin users are allowed everything by User::hasPermission(), but keep role mapping consistent.
        $adminRoleId = DB::table('roles')->where('slug', 'admin')->value('id');
        if ($adminRoleId) {
            DB::table('permission_role')->updateOrInsert(
                ['permission_id' => $permissionId, 'role_id' => $adminRoleId],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }

        // Allow "editor" to reply too (can be removed from UI later if needed).
        $editorRoleId = DB::table('roles')->where('slug', 'editor')->value('id');
        if ($editorRoleId) {
            DB::table('permission_role')->updateOrInsert(
                ['permission_id' => $permissionId, 'role_id' => $editorRoleId],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }
    }

    public function down(): void
    {
        // no-op
    }
};

