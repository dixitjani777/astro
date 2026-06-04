<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('horoscope_contents', function (Blueprint $table) {
            if (!Schema::hasColumn('horoscope_contents', 'title')) {
                $table->string('title', 200)->nullable()->after('sign');
            }
            if (!Schema::hasColumn('horoscope_contents', 'content_html')) {
                $table->longText('content_html')->nullable()->after('money_text');
            }
            if (!Schema::hasColumn('horoscope_contents', 'meta_title')) {
                $table->string('meta_title', 200)->nullable()->after('content_html');
            }
            if (!Schema::hasColumn('horoscope_contents', 'meta_description')) {
                $table->string('meta_description', 500)->nullable()->after('meta_title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('horoscope_contents', function (Blueprint $table) {
            if (Schema::hasColumn('horoscope_contents', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
            if (Schema::hasColumn('horoscope_contents', 'meta_title')) {
                $table->dropColumn('meta_title');
            }
            if (Schema::hasColumn('horoscope_contents', 'content_html')) {
                $table->dropColumn('content_html');
            }
            if (Schema::hasColumn('horoscope_contents', 'title')) {
                $table->dropColumn('title');
            }
        });
    }
};

