<?php

namespace yuridik\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WithdrawsNotification extends Notification
{
    use Queueable;
    private $withdraw;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($withdraw)
    {
        $this->withdraw = $withdraw;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
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
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->withdraw->id,
            'name' => $this->withdraw->user->firstName.$this->withdraw->user->lastName,
            'created_at' => $this->withdraw->created_at,
            'email' => $this->withdraw->user->lawyer->email,
            'card_number' => $this->withdraw->user->card_number,
            'expire_date' => $this->withdraw->user->expire_date,
            'amount' => $this->withdraw->amount
        ];
    }
}
