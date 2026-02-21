<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ApiResetPasswordNotification extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = "https://cakrawalabahasa.com/api/auth/reset-password?token={$this->token}&email={$notifiable->email}";
        // $url = "http://127.0.0.1:8000/api/auth/reset-password?token={$this->token}&email={$notifiable->email}";

        return (new MailMessage)
            ->subject('Reset Password Cakrawala Bahasa')
            ->greeting('Halo!')
            ->line('Permintaan reset password untuk akun mobile.')
            ->action('Reset Password', $url)
            ->line('Link ini berlaku 60 menit.')
            ->line('Jika bukan Anda, abaikan email ini.');
    }
}
