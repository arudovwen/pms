<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TaskedUser extends Notification
{
    use Queueable;
    public $task;
    public $users;



    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task, $users)
    {
        $this->task = $task;
        $this->user = $users;




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
            'user_id' => $this->task->user_id,
            'task_id' => $this->task->id


        ];
    }
}
