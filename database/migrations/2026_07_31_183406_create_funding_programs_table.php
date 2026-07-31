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
        Schema::create('funding_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('organization_name');
            $table->string('organization_logo')->nullable();
            $table->string('funding_amount'); // e.g. "₹50 Lakhs", "Up to ₹1 Cr", "$100,000"
            $table->decimal('funding_amount_numeric', 15, 2)->default(0); // for sorting/filtering
            $table->string('country')->default('India');
            $table->string('industry'); // e.g. "Fintech, AgriTech, SaaS, Healthcare"
            $table->string('funding_type'); // Grant, Equity, Accelerator, Incubator, Government, Private, Angel, VC
            $table->string('startup_stage'); // Idea, MVP, Early Stage, Growth, Scaling
            $table->text('short_description');
            $table->longText('description')->nullable();
            $table->text('eligibility')->nullable();
            $table->text('required_documents')->nullable();
            $table->date('application_deadline')->nullable();
            $table->string('official_apply_url');
            $table->boolean('is_featured')->default(false);
            $table->integer('priority')->default(0);
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active');
            
            // SEO Fields
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funding_programs');
    }
};
