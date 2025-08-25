<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin'; // Jika pakai guard admin

    protected $fillable = [
        'name', 'email', 'password', 'nip', 'position', 'phone', 'address',
    ];

    // Relasi ke persetujuan peminjaman
    public function approvals()
    {
        return $this->hasMany(Rental::class, 'approved_by');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\AdminResetPasswordNotification($token, $this->email));
    }
}