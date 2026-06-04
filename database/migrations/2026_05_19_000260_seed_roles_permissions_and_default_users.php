<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        if (
            !DB::getSchemaBuilder()->hasTable('roles') ||
            !DB::getSchemaBuilder()->hasTable('users') ||
            !DB::getSchemaBuilder()->hasTable('permissions') ||
            !DB::getSchemaBuilder()->hasTable('permission_role')
        ) {
            return;
        }

        $now = now();

        // "Modules" = permission groups. Keep permissions well-defined and grouped.
        $permissions = [
            // Admin
            ['key' => 'admin.dashboard', 'name' => 'Dashboard', 'group' => 'Admin'],
            ['key' => 'admin.enquiries', 'name' => 'Enquiries', 'group' => 'Admin'],
            ['key' => 'admin.users', 'name' => 'Users', 'group' => 'Admin'],
            ['key' => 'admin.roles', 'name' => 'Roles & Permissions', 'group' => 'Admin'],
            ['key' => 'admin.activity', 'name' => 'Activity Logs', 'group' => 'Admin'],
            ['key' => 'admin.tools', 'name' => 'Tools (Clear cache)', 'group' => 'Admin'],

            // Content
            ['key' => 'admin.pages', 'name' => 'CMS Pages', 'group' => 'Content'],
            ['key' => 'admin.blog', 'name' => 'Blog (posts/categories/comments)', 'group' => 'Content'],
            ['key' => 'admin.home_services', 'name' => 'Home Services', 'group' => 'Content'],
            ['key' => 'admin.pandit_services', 'name' => 'Pandit Services', 'group' => 'Content'],
            ['key' => 'admin.daily_horoscopes', 'name' => 'Daily Horoscopes', 'group' => 'Content'],
            ['key' => 'admin.horoscope_content', 'name' => 'Horoscope Content', 'group' => 'Content'],

            // Marketing
            ['key' => 'admin.offers', 'name' => 'Offers', 'group' => 'Marketing'],
            ['key' => 'admin.ad_banners', 'name' => 'Ad Banners', 'group' => 'Marketing'],

            // System
            ['key' => 'admin.settings', 'name' => 'Settings', 'group' => 'System'],
            ['key' => 'admin.smtp', 'name' => 'SMTP Settings', 'group' => 'System'],
            ['key' => 'admin.contact', 'name' => 'Contact & Social', 'group' => 'System'],
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

        $editorRoleId = DB::table('roles')->where('slug', 'editor')->value('id');
        if (!$editorRoleId) {
            $editorRoleId = DB::table('roles')->insertGetId([
                'name' => 'Editor',
                'slug' => 'editor',
                'description' => 'Content management',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Ensure default users exist.
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'editor@example.com'],
            [
                'name' => 'Editor User',
                'password' => Hash::make('editor12345'),
                'role' => 'editor',
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );

        // Assign all permissions to admin role.
        $permissionIds = DB::table('permissions')->pluck('id', 'key');
        foreach ($permissionIds as $key => $permissionId) {
            DB::table('permission_role')->updateOrInsert(
                ['permission_id' => $permissionId, 'role_id' => $adminRoleId],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }

        // Assign a safe, "content editor" subset to editor role.
        $editorKeys = [
            'admin.dashboard',
            'admin.enquiries',
            'admin.pages',
            'admin.blog',
            'admin.home_services',
            'admin.pandit_services',
            'admin.daily_horoscopes',
            'admin.horoscope_content',
            'admin.offers',
            'admin.ad_banners',
        ];

        foreach ($editorKeys as $key) {
            $permissionId = $permissionIds[$key] ?? null;
            if (!$permissionId) {
                continue;
            }

            DB::table('permission_role')->updateOrInsert(
                ['permission_id' => $permissionId, 'role_id' => $editorRoleId],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }
    }

    public function down(): void
    {
        // no-op (do not remove data automatically)
    }
};

