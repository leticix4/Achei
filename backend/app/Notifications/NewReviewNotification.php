<?php

namespace App\Notifications;

use App\Models\Avaliacao;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReviewNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $avaliacao;

    /**
     * Create a new notification instance.
     */
    public function __construct(Avaliacao $avaliacao)
    {
        $this->avaliacao = $avaliacao;
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
            ->subject('Nova avaliação da sua loja')
            ->line('Sua loja "' . $this->avaliacao->store->name . '" recebeu uma nova avaliação.')
            ->line('Nota: ' . $this->avaliacao->nota . '/5')
            ->when($this->avaliacao->content, function ($mail) {
                return $mail->line('Comentário: ' . $this->avaliacao->content);
            })
            ->action('Ver avaliação', url('/stores/' . $this->avaliacao->store_id . '/reviews'))
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
            'avaliacao_id' => $this->avaliacao->id,
            'store_id' => $this->avaliacao->store_id,
            'store_name' => $this->avaliacao->store->name,
            'user_name' => $this->avaliacao->user->name,
            'nota' => $this->avaliacao->nota,
            'content' => $this->avaliacao->content,
            'type' => 'new_review',
        ];
    }
}
