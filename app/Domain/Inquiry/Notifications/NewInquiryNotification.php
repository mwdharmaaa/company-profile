<?php

namespace App\Domain\Inquiry\Notifications;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewInquiryNotification extends Notification
{
    use Queueable;

    public function __construct(public Inquiry $inquiry) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New Inquiry: {$this->inquiry->subject}")
            ->line("From: {$this->inquiry->name} ({$this->inquiry->email})")
            ->line($this->inquiry->message)
            ->action('Inspect in Admin Console', url('/admin/inquiries/' . $this->inquiry->id));
    }
}
