<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Status;
use App\Models\User;
use App\Models\Ticket;

class TicketNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Your ticket has been logged. Below are the ticket details')
                    ->line('Name: ' . $notifiable->user->name)
                    ->line('Surname: ' . $notifiable->user->surname)
                    ->line('Email: ' . $notifiable->user->email)
                    ->line('Department: ' . $notifiable->department->dep_name)
                    ->line('Status: ' . $notifiable->status->status_name)
                    ->line('Description: ' . $notifiable->description)
                    ->action('view ticket', route('tickets.show', $notifiable->ticket->id))
                    ->line("Thank you for logging the ticket, we'll get back to you soon!");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
