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
        Schema::create('day_schedules', function (Blueprint $table) {
            $table->unsignedBigInteger('id_week_day');
            $table->unsignedBigInteger('id_schedule');
            $table->unsignedBigInteger('id_parking_lot');
            $table->primary(['id_week_day','id_parking_lot']);
            $table->foreign('id_week_day')->references('id')->on('week_days')->onDelete('cascade');
            $table->foreign('id_schedule')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('id_parking_lot')->references('id')->on('parking_lots')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_schedules');
    }
};
