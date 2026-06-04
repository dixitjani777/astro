<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiry_replies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('enquiry_id')->constrained('enquiries')->cascadeOnDelete();

            // "admin" or "user"
            $table->string('sender_type');
            $table->foreignId('sender_user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->text('body')->nullable();
            $table->string('payment_url')->nullable();

            $table->string('attachment_disk')->nullable(); // usually "public"
            $table->string('attachment_path')->nullable();
            $table->string('attachment_original_name')->nullable();
            $table->string('attachment_mime')->nullable();
            $table->unsignedBigInteger('attachment_size')->nullable();

            $table->timestamps();

            $table->index(['enquiry_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiry_replies');
    }
};

