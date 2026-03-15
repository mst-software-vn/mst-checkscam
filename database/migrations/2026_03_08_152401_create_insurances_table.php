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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('avatar')->nullable();
            $table->decimal('amount', 15, 2);
            $table->date('insurance_date');
            $table->date('expired_at')->nullable();
            $table->json('contact_info')->nullable();
            $table->json('payment_accounts')->nullable();
            $table->json('services')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('slug')->unique();
            $table->timestamps();

            $table->index('status');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
