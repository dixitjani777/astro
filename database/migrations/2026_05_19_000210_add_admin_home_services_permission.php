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

        $key = 'admin.home_services';
        if (DB::table('permissions')->where('key', $key)->exists()) {
            return;
        }

        DB::table('permissions')->insert([
            'key' => $key,
            'name' => 'Home Services',
            'group' => 'Content',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        if (!DB::getSchemaBuilder()->hasTable('permissions')) {
            return;
        }

        DB::table('permissions')->where('key', 'admin.home_services')->delete();
    }
};

