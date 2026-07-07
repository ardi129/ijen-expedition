<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('package_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('filter_type'); // 'duration' or 'category'
            $table->string('filter_value');
            $table->string('exclude_filter_type')->nullable(); // e.g. 'category'
            $table->string('exclude_filter_value')->nullable(); // e.g. 'honeymoon'
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('package_groups');
    }
};
