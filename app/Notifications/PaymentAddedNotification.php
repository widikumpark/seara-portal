<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentAddedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $payment)
    {
        //
        $this->user = $user;
        $this->payment = $payment;
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
        ->subject('Payment submitted')
        ->greeting('Hi '.$this->user->name.",")
        ->line('Your payment receipt for #'.$this->payment->order_number.' has been received.')
        ->line("We will process your payment and get back to you with an update.")
        ->action('View Payments', url('/payments'))
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
                        'message'=>'Your payment receipt for #'.$this->payment->order_number.' has been received.'
        ];
    }
}