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
        Schema::create('oaes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opportunity_application_id')->constrained('opportunity_applications')->onDelete('cascade');
            $table->foreignId('opportunity_experiences_id')->constrained('experiences')->onDelete('cascade');
            $table->foreignId('professional_experience_id')->constrained('professional_experiences')->onDelete('cascade');
            $table->text('message'); // Message explaining the user's experience
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunity_application_experiences');
    }
};
