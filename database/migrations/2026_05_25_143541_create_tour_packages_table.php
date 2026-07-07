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
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedSmallInteger('duration_days')->default(1);
            $table->unsignedSmallInteger('duration_nights')->default(0);
            $table->unsignedInteger('price')->default(0);
            $table->string('price_note')->nullable();
            $table->string('image')->nullable();
            $table->json('highlights')->nullable();
            $table->json('itinerary')->nullable();
            $table->json('includes')->nullable();
            $table->json('excludes')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};
