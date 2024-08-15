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
        Schema::create('board_experience_committees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('board_experience_id')->constrained()->onDelete('cascade');
            $table->foreignId('committee_id')->constrained()->onDelete('cascade');
            $table->boolean('chair')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_experience_committees');
    }
};
