<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'country_code')) {
                $table->string('country_code', 2)->nullable()->after('mobile');
            }

            if (!Schema::hasColumn('users', 'mobile_verified_at')) {
                $table->timestamp('mobile_verified_at')->nullable()->after('email_verified_at');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unique('mobile');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'country_code')) {
                $table->dropColumn('country_code');
            }

            if (Schema::hasColumn('users', 'mobile_verified_at')) {
                $table->dropColumn('mobile_verified_at');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['mobile']);
        });
    }
};
