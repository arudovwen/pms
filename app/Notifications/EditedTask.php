<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EditedTask extends Notification
{
    use Queueable;
    public $task;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task,$user)
    {
        $this->task = $task;
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
            'user_name' => $this->user->name,
            'task_id' => $this->task->id,
            'project_id' => $this->task->project_id,
            'body' => $this->task->body,
            'duration'=> $this->task->duration
        ];
    }
}
