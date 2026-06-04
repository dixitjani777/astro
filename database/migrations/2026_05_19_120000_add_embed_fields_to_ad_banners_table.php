<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ad_banners', function (Blueprint $table) {
            $table->string('content_type', 20)->default('image')->after('placement');
            $table->text('embed_html')->nullable()->after('link_url');
            $table->string('youtube_url')->nullable()->after('embed_html');
        });

        // Allow non-image banner types (html/youtube) to work without an image.
        $driver = DB::getDriverName();
        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE ad_banners MODIFY image_path VARCHAR(255) NULL');
        }
    }

    public function down(): void
    {
        $driver = DB::getDriverName();
        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE ad_banners MODIFY image_path VARCHAR(255) NOT NULL');
        }

        Schema::table('ad_banners', function (Blueprint $table) {
            $table->dropColumn(['content_type', 'embed_html', 'youtube_url']);
        });
    }
};

