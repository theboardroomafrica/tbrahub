<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('client_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('package_id')->nullable()->constrained()->nullOnDelete();
            $table->string('stripe_subscription_id')->nullable(); // Store Stripe subscription ID for reference
            $table->integer('credits_assigned'); // Track how many credits were assigned
            $table->dateTime('started_at'); // When the subscription or plan started
            $table->dateTime('ended_at')->nullable(); // When the subscription or plan ended (null if active)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_subscriptions');
    }
};
