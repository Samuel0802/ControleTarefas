<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;


class RedefinirSenhaNotification extends Notification
{
    use Queueable;

    public $token;
    public $email;
    public $name;

//Recuperar o atributo $token do User.php
    public function __construct($token, $email, $name)
    {
       $this->token = $token;
       //Adicionar o email ao atributo a notificação
       $this->email = $email;
       $this->name = $name;
    }


    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * vendor/laravel/src/Illuminate/Auth/Notifications/ResetPassword.php - Notifications padrão Email
     */

    //   vendor/laravel/src/Illuminate/Notifications/resources/email.blade.php - Rodape da notifications padrão Email

    public function toMail(object $notifiable): MailMessage

    {
        $url = 'http://localhost:8000/password/reset/'.$this->token.'?email='.$this->email;
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $saudacao = 'Olá, '.$this->name;

        return (new MailMessage)
        ->subject('Atualização de Senha') //Titulo do Email
        ->greeting($saudacao) //saudação
        ->line('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha da sua conta.')//texto no email
        ->action('Alterar Senha', $url) //Botão para alterar senha
        ->line('O link acima expira em '.$minutos.' minutos.',)
        ->line('Se você não solicitou uma redefinição de senha, nenhuma ação adicional será necessária.')
        ->salutation('Até breve');
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
