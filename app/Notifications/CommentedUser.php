<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentedUser extends Notification
{
    use Queueable;
    public  $comments;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comments, $user)
    {
        $this->comment = $comments;
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
        return ['database'];
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->comment->user_id,
            'user_name' => $this->user->name,
            'comment_id' => $this->comment->id
        ];
    }
}
