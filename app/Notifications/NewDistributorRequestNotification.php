<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDistributorRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $distributor_request)
    {
        $this->user = $user;
        $this->distributor_request = $distributor_request;
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
        ->subject('Request For Exclusive Distributor')
        ->greeting('Hi '.$this->user->name.",")
        ->line('Your request to distribute '.$this->distributor_request->product_name.' in '.$this->distributor_request->country_name." has been received.")
        ->line("Payment by: ".$this->distributor_request->payment_method)
        ->line("Refundable Deposit: USD $".$this->distributor_request->package_cost)
        ->line("Payment instructions and further documentation will be emailed to you soonest.")
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
            //
            'message'=>'Your request to distribute '.$this->distributor_request->product_name.' in '.$this->distributor_request->country_name." has been received."
        ];
    }
}