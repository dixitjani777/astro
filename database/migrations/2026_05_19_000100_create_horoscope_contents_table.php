<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horoscope_contents', function (Blueprint $table) {
            $table->id();

            $table->string('period', 16)->default('daily');
            $table->string('sign', 32);

            $table->unsignedTinyInteger('health_percent')->nullable();
            $table->unsignedTinyInteger('occupation_percent')->nullable();
            $table->unsignedTinyInteger('wealth_percent')->nullable();
            $table->unsignedTinyInteger('family_percent')->nullable();
            $table->unsignedTinyInteger('love_life_percent')->nullable();

            $table->text('love_text')->nullable();
            $table->text('career_text')->nullable();
            $table->text('health_text')->nullable();
            $table->text('money_text')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(['period', 'sign']);
            $table->index(['period', 'sign']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horoscope_contents');
    }
};

