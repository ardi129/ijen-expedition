<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_stats', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // e.g. "5+", "5.000+"
            $table->string('label'); // e.g. "Tahun Pengalaman"
            $table->string('color')->nullable(); // 'primary' or 'accent'
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_stats');
    }
};
