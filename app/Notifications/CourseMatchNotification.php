<?php

namespace App\Notifications;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CourseMatchNotification extends Notification
{
    use Queueable;
    public $course;

    public function __construct(Course $course) { $this->course = $course; }

    public function via($notifiable): array { return ['database', 'mail']; }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Course Match: ' . $this->course->title)
            ->line('A new course matches your interests: ' . $this->course->title)
            ->action('View Course', $this->course->url)
            ->line('Start learning today!');
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title' => 'New Course: ' . $this->course->title,
            'message' => $this->course->provider . ' has added a new course.',
            'job_slug' => '#', // Hum course link direct use karenge
        ];
    }
}