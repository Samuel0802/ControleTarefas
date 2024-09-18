<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Tarefa;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;

//Controla a view emails/novatarefa.blade.php

public $tarefa;
public $data_limite_conclusao;
public $url;



    public function __construct(Tarefa $tarefa)
    {
  $this->tarefa = $tarefa->tarefa;
  $this->data_limite_conclusao = date('d/m/Y', strtotime($tarefa->data_limite_conclusao)); //Convertendo padrão da data
  $this->url = 'http://localhost:8000/tarefa/'.$tarefa->id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nova Tarefa Criada', //Titulo do Email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.novatarefa',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
