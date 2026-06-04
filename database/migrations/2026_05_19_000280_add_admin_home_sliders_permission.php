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
        $key = 'admin.home_sliders';

        DB::table('permissions')->updateOrInsert(
            ['key' => $key],
            ['name' => 'Home Slider', 'group' => 'Content', 'created_at' => $now, 'updated_at' => $now]
        );

        if (!DB::getSchemaBuilder()->hasTable('roles') || !DB::getSchemaBuilder()->hasTable('permission_role')) {
            return;
        }

        $permissionId = DB::table('permissions')->where('key', $key)->value('id');
        if (!$permissionId) {
            return;
        }

        foreach (['admin', 'editor'] as $slug) {
            $roleId = DB::table('roles')->where('slug', $slug)->value('id');
            if (!$roleId) {
                continue;
            }

            DB::table('permission_role')->updateOrInsert(
                ['permission_id' => $permissionId, 'role_id' => $roleId],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }
    }

    public function down(): void
    {
        if (!DB::getSchemaBuilder()->hasTable('permissions')) {
            return;
        }

        DB::table('permissions')->where('key', 'admin.home_sliders')->delete();
    }
};

