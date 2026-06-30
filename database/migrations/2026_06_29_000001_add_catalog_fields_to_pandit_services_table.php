<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pandit_services', function (Blueprint $table) {
            if (!Schema::hasColumn('pandit_services', 'category')) {
                $table->string('category', 120)->nullable()->after('title');
            }

            if (!Schema::hasColumn('pandit_services', 'benefits')) {
                $table->longText('benefits')->nullable()->after('short_text');
            }

            if (!Schema::hasColumn('pandit_services', 'details_html')) {
                $table->longText('details_html')->nullable()->after('benefits');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pandit_services', function (Blueprint $table) {
            if (Schema::hasColumn('pandit_services', 'details_html')) {
                $table->dropColumn('details_html');
            }
            if (Schema::hasColumn('pandit_services', 'benefits')) {
                $table->dropColumn('benefits');
            }
            if (Schema::hasColumn('pandit_services', 'category')) {
                $table->dropColumn('category');
            }
        });
    }
};
