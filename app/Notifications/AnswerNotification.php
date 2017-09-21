<?php

namespace yuridik\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AnswerNotification extends Notification
{
    use Queueable;
    private $answer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($answer)
    {
        $this->answer = $answer;
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
        return [
            'file'=>$this->answer->lawyerable->user->file,
            'user' => $this->answer->lawyerable->user,
            'created_at'=> $this->answer->created_at,
            'title' => $this->answer->question->title,
            'lawyer_id' => $this->answer->lawyerable->id,
            'question_id'=> $this->answer->question->id,
            'job_status'=> $this->answer->lawyerable->job_status,
            'id'=>$this->answer->id,
            ];
    }
}
