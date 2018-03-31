<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Published extends Notification
{
    
	
	
	use Queueable;
	
	protected $email;  

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email)
    {
       $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
		            ->subject('Inicio de sesión sospechoso')
					->greeting('Hola ' . $notifiable->name)
                    ->line('Hubo un inicio de sesión sospechoso del usuario '.$this->email)
                    ->line('Si no fuiste vos, entra a tu perfil para cambiar tu clave')
                    ->action('Cambiar Clave', 'https://laravel/')
					
                    ->line('Gracias!!!');
															
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
