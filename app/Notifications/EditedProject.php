<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EditedProject extends Notification
{
    use Queueable;
    public $project;
    public $user;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project, $user)
    {
        $this->project = $project;
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

            'user_id'=> $this->project->user_id,
            'project_id' => $this->project->id,
            'project_name' => $this->project->name,
            'user_name' => $this->user->name

        ];
    }
}


