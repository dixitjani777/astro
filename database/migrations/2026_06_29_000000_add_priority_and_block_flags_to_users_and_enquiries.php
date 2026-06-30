<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'priority')) {
                $table->string('priority', 20)->nullable()->after('role');
            }

            if (!Schema::hasColumn('users', 'is_blocked')) {
                $table->boolean('is_blocked')->default(false)->after('priority');
            }
        });

        Schema::table('enquiries', function (Blueprint $table) {
            if (!Schema::hasColumn('enquiries', 'priority')) {
                $table->string('priority', 20)->nullable()->after('meta');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'is_blocked')) {
                $table->dropColumn('is_blocked');
            }
            if (Schema::hasColumn('users', 'priority')) {
                $table->dropColumn('priority');
            }
        });

        Schema::table('enquiries', function (Blueprint $table) {
            if (Schema::hasColumn('enquiries', 'priority')) {
                $table->dropColumn('priority');
            }
        });
    }
};
