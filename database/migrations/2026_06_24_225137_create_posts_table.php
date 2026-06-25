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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_hi');
            $table->string('title_en');
            $table->string('category');
            $table->string('category_label');
            $table->string('color');
            $table->string('badge_class');
            $table->text('excerpt');
            $table->string('author');
            $table->string('author_initial');
            $table->string('author_role');
            $table->text('author_bio');
            $table->string('date');
            $table->string('read_time');
            $table->json('takeaways');
            $table->json('sections');
            $table->json('tags');
            $table->text('conclusion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
