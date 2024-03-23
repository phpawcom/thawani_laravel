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
        Schema::create('thawani_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('laravel_session_id', 255);
            $table->string('thawani_session_id', 255);
            $table->string('payment_id', 255)->comment('from thawani, for refund')->nullable();
            $table->json('products')->nullable();
            $table->json('metadata')->nullable();
            $table->string('client_reference', 255)->nullable();
            $table->string('ip', 60)->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thawani_logs');
    }
};
