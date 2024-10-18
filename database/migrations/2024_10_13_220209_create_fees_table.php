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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('cost');
            $table->unsignedBigInteger('id_parking_lot');
            $table->unsignedBigInteger('id_vehicle_type');
            $table->foreign('id_parking_lot')->references('id')->on('parking_lots')->onDelete('cascade');
            $table->foreign('id_vehicle_type')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
