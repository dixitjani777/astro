<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_translations', function (Blueprint $table) {
            $table->id();
            $table->string('source_locale', 16);
            $table->string('target_locale', 16);
            $table->text('source_text');
            $table->text('translated_text');
            $table->string('hash', 64)->unique();
            $table->timestamps();

            $table->index(['source_locale', 'target_locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_translations');
    }
};

