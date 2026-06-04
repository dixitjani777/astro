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

        $key = 'admin.horoscope_content';
        $exists = DB::table('permissions')->where('key', $key)->exists();
        if ($exists) {
            return;
        }

        DB::table('permissions')->insert([
            'key' => $key,
            'name' => 'Horoscope Content',
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

        DB::table('permissions')->where('key', 'admin.horoscope_content')->delete();
    }
};

