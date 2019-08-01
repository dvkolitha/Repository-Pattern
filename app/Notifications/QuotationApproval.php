<?php

namespace App\Notifications;

use App\Quotation\Quotation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuotationApproval extends Notification
{
    use Queueable;

    private $quotation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($quotationId)
    {
        $this->quotation = Quotation::find($quotationId);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
       
    }

    public function toDatabase($notifiable)
    {
        return [
            "quotation_id" => $this->quotation->id,
            "created_by" => $this->quotation->created_by
        ];
    }
}
