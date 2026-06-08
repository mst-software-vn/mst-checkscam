<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newfeed_post_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('newfeed_posts')->cascadeOnDelete();
            $table->foreignId('reporter_id')->constrained('users')->cascadeOnDelete();
            $table->string('reason', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->unique(['post_id', 'reporter_id']);
            $table->index(['post_id', 'reporter_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newfeed_post_reports');
    }
};
