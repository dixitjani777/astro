<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('slug', 150)->unique();
            $table->string('subject', 200)->nullable();
            $table->longText('body_html')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        if (DB::getSchemaBuilder()->hasTable('permissions')) {
            $now = now();
            DB::table('permissions')->updateOrInsert(
                ['key' => 'admin.email_templates'],
                ['name' => 'Email Templates', 'group' => 'System', 'created_at' => $now, 'updated_at' => $now]
            );

            if (DB::getSchemaBuilder()->hasTable('roles') && DB::getSchemaBuilder()->hasTable('permission_role')) {
                $permissionId = DB::table('permissions')->where('key', 'admin.email_templates')->value('id');
                if ($permissionId) {
                    foreach (['admin', 'editor'] as $roleSlug) {
                        $roleId = DB::table('roles')->where('slug', $roleSlug)->value('id');
                        if (!$roleId) {
                            continue;
                        }

                        DB::table('permission_role')->updateOrInsert(
                            ['permission_id' => $permissionId, 'role_id' => $roleId],
                            ['created_at' => $now, 'updated_at' => $now]
                        );
                    }
                }
            }
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('permissions')) {
            DB::table('permissions')->where('key', 'admin.email_templates')->delete();
        }

        Schema::dropIfExists('email_templates');
    }
};
