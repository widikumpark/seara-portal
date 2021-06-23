<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPaymentSubmissionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $user, $payment)
    {
      
        $this->payment = $payment;
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
        ->subject("New Payment Submission")
                    ->line($this->user->name." just submitted a payment")
                    ->line('Order:'. $this->payment->order_number);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiables
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}