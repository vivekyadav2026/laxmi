<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('old_price')->nullable()->after('price');
            $table->string('badge_en')->nullable()->after('slug');
            $table->string('badge_hi')->nullable()->after('badge_en');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['old_price', 'badge_en', 'badge_hi']);
        });
    }
};
