<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CandidateNew extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacancyId, $vacancyTitle, $userId)
    {
        $this->vacancyId = $vacancyId;
        $this->vacancyTitle = $vacancyTitle;
        $this->userId = $userId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/notifications');

        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante')
                    ->line('La vacante es: '.$this->vacancyTitle)
                    ->action('Ver Notificaciones ', $url)
                    ->line('Gracias por utilizar DevJobs!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'vacancyId' => $this->vacancyId,
            'vacancyTitle' => $this->vacancyTitle,
            'userId' => $this->userId
        ];
    }
}
