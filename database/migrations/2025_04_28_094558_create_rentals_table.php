<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('approved_by')->nullable()->constrained('admins')->onDelete('set null');
            $table->string('vehicle_name');
            $table->string('fuel')->nullable();
            $table->integer('kilometers')->nullable();
            $table->integer('start_kilometer')->nullable(); // kilometer awal, diisi admin
            $table->integer('end_kilometer')->nullable();   // kilometer akhir, diisi peminjam saat pengembalian
            $table->string('license_plate');
            $table->timestamp('time_out')->nullable();
            $table->timestamp('time_in')->nullable();
            $table->text('damage')->nullable();
            $table->string('status')->default('pending');
            $table->timestamp('approved_at')->nullable();
            $table->string('rejection_reason')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); // audit: siapa yang membuat
            $table->unsignedBigInteger('updated_by')->nullable(); // audit: siapa yang terakhir mengubah
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
