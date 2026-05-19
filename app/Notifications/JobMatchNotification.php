<?php

namespace App\Notifications;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class JobMatchNotification extends Notification
{
    use Queueable;

    public $job;

    public function __construct(Job $job) {
        $this->job = $job;
    }

    public function via(object $notifiable): array
    {
        // Ab hum queue ka use nahi kar rahe, direct bhejenge
        return ['database', 'mail']; 
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Job Match: ' . $this->job->title)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('A new job matches your skills/interests: ' . $this->job->title)
            ->line('Company: ' . $this->job->company)
            ->action('View Job', url('/jobs/' . $this->job->slug))
            ->line('Good luck with your application!');
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => "New Job Match: {$this->job->title}",
            'message' => "{$this->job->company} is hiring for {$this->job->title}.",
            'job_slug' => $this->job->slug,
            'icon' => 'bi-briefcase-fill'
        ];
    }
}