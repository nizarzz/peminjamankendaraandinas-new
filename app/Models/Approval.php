<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'vehicle_name',
        'fuel',
        'kilometers',
        'license_plate',
        'time_out',
        'time_in',
        'damage',
        'approved_by', // Ini bisa menjadi user_id
        'approved_at',
        'rejection_reason',
    ];

    protected $dates = [
        'time_out',
        'time_in',
        'approved_at',
        'created_at',
        'updated_at',
    ];

    // Relasi dengan User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}