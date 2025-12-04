<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nova mensagem sobre seu produto')
            ->line('Você recebeu uma nova mensagem sobre o produto: ' . $this->message->product->name)
            ->line('Mensagem: ' . $this->message->content)
            ->action('Ver mensagem', url('/messages/' . $this->message->id))
            ->line('Obrigado por usar nossa aplicação!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message_id' => $this->message->id,
            'product_id' => $this->message->product_id,
            'product_name' => $this->message->product->name,
            'sender_name' => $this->message->user->name,
            'content' => $this->message->content,
            'type' => 'new_message',
        ];
    }
}
