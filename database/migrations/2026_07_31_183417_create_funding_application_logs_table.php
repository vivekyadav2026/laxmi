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
        Schema::create('funding_application_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funding_application_id')->constrained('funding_applications')->onDelete('cascade');
            $table->enum('type', ['email', 'whatsapp', 'status_change', 'document_upload', 'admin_note'])->default('admin_note');
            $table->string('sender')->default('system'); // admin, user, system
            $table->text('message');
            $table->string('attachment_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funding_application_logs');
    }
};
