<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob')->nullable()->after('mobile');
            $table->string('location', 255)->nullable()->after('dob');
            $table->string('state', 120)->nullable()->after('location');
            $table->string('city', 120)->nullable()->after('state');
            $table->string('pincode', 20)->nullable()->after('city');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['dob', 'location', 'state', 'city', 'pincode']);
        });
    }
};
