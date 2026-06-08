<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newfeed_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('category', 100);
            $table->text('content');
            $table->decimal('price', 15, 0)->nullable();
            $table->string('image_path', 500)->nullable();
            $table->tinyInteger('is_hidden')->default(0);
            $table->tinyInteger('hidden_by_admin')->default(0);
            $table->unsignedInteger('report_count')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['created_at']);
            $table->index(['category']);
            $table->index(['is_hidden']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newfeed_posts');
    }
};
