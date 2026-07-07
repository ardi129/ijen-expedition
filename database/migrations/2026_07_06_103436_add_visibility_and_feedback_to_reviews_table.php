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
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('is_approved');
            $table->boolean('is_visible')->default(false)->after('comment');
            $table->text('admin_feedback')->nullable()->after('is_visible');
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('admin_feedback');
            $table->dropColumn('is_visible');
            $table->boolean('is_approved')->default(false);
        });
    }
};
