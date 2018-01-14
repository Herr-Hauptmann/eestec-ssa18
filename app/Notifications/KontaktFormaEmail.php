<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class KontaktFormaEmail extends Notification
{
    use Queueable;

    protected $ime;
    protected $email;
    protected $poruka;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ime, $email, $poruka)
    {
        $this->ime = $ime;
        $this->email = $email;
        $this->poruka = $poruka;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('[SSA] Kontakt forma')
                    ->greeting('Novi upit!')
                    ->line('Poslao/la: ' . $this->ime)
                    ->line('Email: ' . $this->email)
                    ->line('Poruka: <br/>' . $this->poruka)
                    ->salute('Pogledaj kroz prozor');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
