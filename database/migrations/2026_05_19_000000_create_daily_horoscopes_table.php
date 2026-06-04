<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_horoscopes', function (Blueprint $table) {
            $table->id();

            $table->string('sign', 32);
            $table->date('for_date');

            $table->text('description')->nullable();
            $table->string('lucky_number', 64)->nullable();
            $table->string('lucky_color', 64)->nullable();
            $table->string('mood', 64)->nullable();
            $table->string('compatibility', 64)->nullable();
            $table->string('lucky_time', 64)->nullable();
            $table->string('date_range', 64)->nullable();

            $table->string('source', 128)->nullable();
            $table->json('raw')->nullable();
            $table->timestamp('fetched_at')->nullable();

            $table->timestamps();

            $table->unique(['sign', 'for_date']);
            $table->index(['for_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_horoscopes');
    }
};

