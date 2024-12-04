<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Tache;

class TaskAssigned extends Notification
{
    use Queueable;

    public $tache;
    public $assignerName;
    public $projectName;

    /**
     * Create a new notification instance.
     */
    public function __construct(Tache $tache, $assignerName)
    {
        //
        $this->tache = $tache;
        $this->assignerName = $assignerName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Tâche assignée')
            ->line('Une nouvelle tâche vous a été assignée par ' . $this->assignerName)
            ->line('Connectez-vous avec le lien ci-dessous puis accédez à votre gestionnaire de tâches')
            ->action('Voir la tâche', route('login'))
            ->line('Merci d\'utiliser notre application!');
    
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
