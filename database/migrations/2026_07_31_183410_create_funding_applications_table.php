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
        Schema::create('funding_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_number')->unique();
            $table->foreignId('funding_program_id')->constrained('funding_programs')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            
            // Applicant Details
            $table->string('founder_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('startup_name');
            $table->string('industry');
            $table->string('startup_stage');
            $table->string('funding_required');
            $table->text('startup_description');
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            
            // Uploads
            $table->string('pitch_deck_path')->nullable();
            $table->string('business_plan_path')->nullable();
            $table->string('financial_projection_path')->nullable();
            $table->text('additional_notes')->nullable();
            
            // Service Package & Payment
            $table->string('package_name')->default('Basic'); // Basic (₹499), Professional (₹999), Premium (₹1999), Enterprise (Custom)
            $table->decimal('package_price', 10, 2)->default(499.00);
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid');
            $table->string('payment_id')->nullable();
            $table->string('razorpay_order_id')->nullable();
            
            // Workflow & Status Timeline
            $table->string('assigned_executive')->nullable();
            $table->enum('status', [
                'Pending Documents',
                'Under Review',
                'Assigned Executive',
                'Application Submitted',
                'Waiting for Response',
                'Interview',
                'Approved',
                'Rejected'
            ])->default('Pending Documents');
            
            $table->text('admin_notes')->nullable();
            $table->text('internal_comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funding_applications');
    }
};
