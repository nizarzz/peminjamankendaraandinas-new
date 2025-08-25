<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',       // ← Tambahkan ini supaya vehicle_id bisa disimpan
        'vehicle_name',
        'fuel',
        'purpose',
        'kilometers',
        'license_plate',
        'time_out',
        'time_in',
        'damage',
        'status',
        'approved_by',
        'approved_at',
        'rejection_reason',
        'start_kilometer', // kilometer awal
        'end_kilometer',   // kilometer akhir
        'created_by',      // audit
        'updated_by',      // audit
    ];

    protected $dates = [
        'time_out',
        'time_in',
        'approved_at',
        'created_at',
        'updated_at',
    ];

    // Relasi ke user peminjam (tabel users)
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    // Relasi ke admin penyetuju (tabel admins)
    public function approver()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    // Relasi ke kendaraan (tabel vehicles)
    public function vehicle()
    {
        return $this->belongsTo(\App\Models\Vehicle::class, 'vehicle_id');
    }

    // Relasi ke user pembuat (audit trail)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    // Relasi ke user pengubah terakhir (audit trail)
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    protected $casts = [
        'time_out' => 'datetime',
        'time_in' => 'datetime',
    ];
    
    // Accessor untuk jarak tempuh
    public function getJarakTempuhAttribute()
    {
        if (!is_null($this->end_kilometer) && !is_null($this->start_kilometer) && $this->end_kilometer > $this->start_kilometer) {
            return $this->end_kilometer - $this->start_kilometer;
        }
        return 0;
    }
}
