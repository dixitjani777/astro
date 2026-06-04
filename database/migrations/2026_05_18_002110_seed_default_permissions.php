<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        $permissions = [
            ['key' => 'admin.dashboard', 'name' => 'Dashboard', 'group' => 'Admin'],
            ['key' => 'admin.enquiries', 'name' => 'Enquiries', 'group' => 'Admin'],
            ['key' => 'admin.pages', 'name' => 'CMS Pages', 'group' => 'Admin'],
            ['key' => 'admin.blog', 'name' => 'Blog (posts/categories/comments)', 'group' => 'Admin'],
            ['key' => 'admin.offers', 'name' => 'Offers', 'group' => 'Admin'],
            ['key' => 'admin.ad_banners', 'name' => 'Ad Banners', 'group' => 'Admin'],
            ['key' => 'admin.users', 'name' => 'Users', 'group' => 'Admin'],
            ['key' => 'admin.roles', 'name' => 'Roles & Permissions', 'group' => 'Admin'],
            ['key' => 'admin.settings', 'name' => 'Settings', 'group' => 'Admin'],
            ['key' => 'admin.smtp', 'name' => 'SMTP Settings', 'group' => 'Admin'],
            ['key' => 'admin.contact', 'name' => 'Contact & Social', 'group' => 'Admin'],
            ['key' => 'admin.activity', 'name' => 'Activity Logs', 'group' => 'Admin'],
            ['key' => 'admin.tools', 'name' => 'Tools (Clear cache)', 'group' => 'Admin'],
        ];

        foreach ($permissions as $p) {
            DB::table('permissions')->updateOrInsert(
                ['key' => $p['key']],
                ['name' => $p['name'], 'group' => $p['group'], 'updated_at' => $now, 'created_at' => $now]
            );
        }

        $adminRoleId = DB::table('roles')->where('slug', 'admin')->value('id');
        if (!$adminRoleId) {
            $adminRoleId = DB::table('roles')->insertGetId([
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Full access',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
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
        // no-op (do not remove data automatically)
    }
};

