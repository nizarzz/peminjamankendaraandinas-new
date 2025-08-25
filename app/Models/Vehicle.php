<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name',
        'license_plate',
        'type',
        'year',
        'fuel_type',
        'status',
        'last_service_date',
        'start_kilometer',
        'end_kilometer',
    ];

    // Relasi: satu kendaraan bisa punya banyak peminjaman
    public function rentals()
    {
        return $this->hasMany(Rental::class); // pastikan Rental model pakai vehicle_id
    }
}
