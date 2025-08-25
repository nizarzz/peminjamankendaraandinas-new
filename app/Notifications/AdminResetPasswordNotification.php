<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AdminResetPasswordNotification extends Notification
{
    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password Admin')
            ->line('Klik tombol di bawah untuk mereset password admin Anda.')
            ->action('Reset Password', url(route('admin.password.reset', [
                'token' => $this->token,
                'email' => $this->email,
            ], false)))
            ->line('Link reset password akan kadaluarsa dalam 60 menit.')
            ->line('Jika Anda tidak meminta reset password, abaikan email ini.');
    }
} 