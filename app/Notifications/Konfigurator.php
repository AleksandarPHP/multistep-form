<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class Konfigurator extends Notification
{
    use Queueable;

    protected $html, $email, $name;

    /**
     * Create a new notification instance.
     */    
    public function __construct($html, $email, $name)
    {
        $this->html = $html;
        $this->email = $email;
        $this->name = $name;
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
                    ->subject('Konfigurator')
                    ->replyTo($this->email, $this->name)
                    ->line(new HtmlString($this->html))
                    ->action('Home', url('/'))
                    ->salutation('Freundliche Grüsse');
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
