<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('daily_horoscopes', function (Blueprint $table) {
            $table->text('admin_description')->nullable()->after('description');
            $table->timestamp('admin_updated_at')->nullable()->after('admin_description');
        });
    }

    public function down(): void
    {
        Schema::table('daily_horoscopes', function (Blueprint $table) {
            $table->dropColumn(['admin_description', 'admin_updated_at']);
        });
    }
};

