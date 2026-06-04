<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (!DB::getSchemaBuilder()->hasTable('roles') || !DB::getSchemaBuilder()->hasTable('permissions') || !DB::getSchemaBuilder()->hasTable('permission_role')) {
            return;
        }

        $now = now();

        $adminRoleId = DB::table('roles')->where('slug', 'admin')->value('id');
        if (!$adminRoleId) {
            return;
        }

        $permissionIds = DB::table('permissions')->pluck('id');
        foreach ($permissionIds as $permissionId) {
            DB::table('permission_role')->updateOrInsert(
                ['permission_id' => $permissionId, 'role_id' => $adminRoleId],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }
    }

    public function down(): void
    {
        // no-op
    }
};

