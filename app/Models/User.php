<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'nip', 'bidang',
    ];

    // Relasi ke peminjaman
    public function rentals()
    {
        return $this->hasMany(Rental::class, 'user_id');
    }
}