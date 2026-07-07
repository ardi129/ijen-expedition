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
        Schema::create('package_destination', function (Blueprint $table) {
            $table->foreignId('tour_package_id')->constrained()->cascadeOnDelete();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->primary(['tour_package_id', 'destination_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_destination');
    }
};
