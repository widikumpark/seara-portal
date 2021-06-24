<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQuoteRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $quote)
    {
        $this->quote = $quote;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
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
        ->subject('New Quote Request')
        ->greeting('Hi '.$this->user->name)
        ->line('Your new quote #'.$this->quote->number.' has been requested')
        ->line("We will process your request and get back to you with an update.")
        ->action('View Quote', url('/view-quote/'.$this->quote->number))
        ->line('For updates or questions, email export@searaalimentos.br.com');
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
            'message'=>'Your new quote #'.strtoupper($this->quote->number).' has been requested'
        ];
    }
}