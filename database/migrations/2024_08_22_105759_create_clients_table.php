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
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->string('org_type')->nullable();
            $table->tinyInteger('sector_id')->nullable();
            $table->string('portfolios')->nullable();
            $table->string('parent_company')->nullable();
            $table->boolean('mulitple_search')->default(0);
            $table->boolean('for_profit')->default(0);
            $table->string('role')->nullable();
            $table->foreignId('growth_stage_id')->nullable()->references('id')->on('growth_stages')->onDelete('set null');
            $table->boolean('is_founder')->default(0);
            $table->boolean('has_board_experience')->default(0);
            $table->boolean('isApproved')->default(0);
            $table->boolean('hasActiveSubscription')->default(0);
            $table->unsignedSmallInteger('direct_reports')->nullable();
            $table->unsignedSmallInteger('indirect_reports')->nullable();
            $table->text('bio')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->foreignId('nationality_id')->nullable();
            $table->foreignId('other_nationality_id')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
