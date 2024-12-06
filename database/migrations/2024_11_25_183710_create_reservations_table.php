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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_number', 10)->unique();
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_id');
            $table->integer('total');
            $table->unsignedBigInteger('id_reservation_state');
            $table->unsignedBigInteger('id_payment_method');
            $table->unsignedBigInteger('id_parking_space');
            $table->unsignedBigInteger('id_fee');
            $table->foreign('id_reservation_state')->references('id')->on('reservation_states')->onDelete('cascade');
            $table->foreign('id_payment_method')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('id_parking_space')->references('id')->on('parking_spaces')->onDelete('cascade');
            $table->foreign('id_fee')->references('id')->on('fees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
