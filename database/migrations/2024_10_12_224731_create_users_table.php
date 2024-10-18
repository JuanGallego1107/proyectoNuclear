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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('phone_number');
            $table->string('id_number');
            $table->string('email')->unique();
            $table->char('state')->default('1');
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_parking_lot');
            $table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('id_parking_lot')->references('id')->on('parking_lots')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
