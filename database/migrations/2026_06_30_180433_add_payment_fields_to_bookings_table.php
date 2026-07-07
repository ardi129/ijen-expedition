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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('payment_proof')->nullable()->after('special_requests');
            $table->unsignedBigInteger('total_price')->nullable()->after('payment_proof');
            $table->string('payment_status')->default('unpaid')->after('total_price');
            $table->text('payment_note')->nullable()->after('payment_status');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['payment_proof', 'total_price', 'payment_status', 'payment_note']);
        });
    }
};
