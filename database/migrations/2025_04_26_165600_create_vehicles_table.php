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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: Avanza, Xenia
            $table->string('license_plate')->unique();
            $table->string('type'); // Mobil, Motor, Bus
            $table->integer('year');
            $table->string('fuel_type'); // Bensin, Diesel
            $table->string('status')->default('available'); // available, rented, maintenance
            $table->date('last_service_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
