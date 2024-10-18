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
        Schema::create('additional_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('cost');
            $table->unsignedBigInteger(column: 'id_parking_lot');
            $table->foreign('id_parking_lot')->references('id')->on('parking_lots')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_services');
    }
};
