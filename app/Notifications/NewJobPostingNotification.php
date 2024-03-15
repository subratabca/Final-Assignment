<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJobPostingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $company_name;
    public $job_title;

    public function __construct($company_name,$job_title)
    {
        $this->company_name = $company_name;
        $this->job_title = $job_title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $company_name = $this->company_name;
        $job_title = $this->job_title;
        return (new MailMessage)
        ->from('support@company.com')->view('email.new-job-posting-details',compact('company_name','job_title'))
        ->subject('New Job Posting Mail');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'data' => 'New Job Posting Notification',
        ];
    }
}
