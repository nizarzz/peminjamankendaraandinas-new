<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi (menambahkan kolom vehicle_id).
     */
    public function up(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            // Tambahkan kolom vehicle_id (relasi ke tabel vehicles)
            $table->foreignId('vehicle_id')
                  ->constrained() // otomatis relasi ke tabel vehicles (id)
                  ->onDelete('cascade') // jika vehicle dihapus, rental ikut terhapus
                  ->after('user_id'); // opsional: letak setelah user_id
        });
    }

    /**
     * Rollback migrasi (hapus kolom vehicle_id kalau migrasi di-revert).
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign(['vehicle_id']);
            $table->dropColumn('vehicle_id');
        });
    }
};
