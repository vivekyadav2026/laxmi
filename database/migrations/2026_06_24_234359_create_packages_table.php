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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name_hi');
            $table->string('name_en');
            $table->string('slug')->unique();
            $table->string('type'); // 'legal' or 'tech'
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->string('description_hi')->nullable();
            $table->string('description_en')->nullable();
            $table->string('badge_hi')->nullable();
            $table->string('badge_en')->nullable();
            $table->json('features');
            $table->json('comparison_features')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
