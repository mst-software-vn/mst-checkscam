<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['account', 'website'])->default('account');
            $table->string('reporter_name');
            $table->string('reporter_contact');
            $table->string('target_id'); // STK/SĐT or URL
            $table->string('target_name')->nullable();
            $table->string('target_bank')->nullable();
            $table->string('category')->nullable();
            $table->text('description');
            $table->json('evidence_images')->nullable();
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->string('rejection_reason')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('search_count')->default(0);
            $table->foreignId('moderator_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();

            $table->index('target_id');
            $table->index('status');
            $table->index('type');
            $table->index('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
