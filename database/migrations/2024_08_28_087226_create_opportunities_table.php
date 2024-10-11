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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->integer('employees')->nullable();
            $table->text('info')->nullable();
            $table->foreignUuid('client_id')->references('id')->on('clients');
            $table->foreignId('revenue_id')->nullable()->references('id')->on('revenue_categories')->onDelete('set null');
            $table->foreignId('type_id')->nullable()->references('id')->on('opportunity_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
