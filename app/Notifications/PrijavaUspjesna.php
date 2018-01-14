<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PrijavaUspjesna extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                    ->subject('[SSA \'' . date('y') . ']')
                    ->greeting('Vaša prijava je uspješeno pohranjena.')
                    ->line("Hvala Vam na odvojenom vremenu i interesu za Soft Skills Academy Sarajevo. Za najnovije obavijesti pratite nas na <a target=\"_blank\" href=\"https://www.facebook.com/SoftSkillsAcademySarajevo\">facebook-u</a> i našoj <a target=\"_blank\" href=\"http://www.softskillsacademy.ba\">web stranici</a>.")
                    ->line('Hvala Vam na ukazanom povjerenju.');
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
