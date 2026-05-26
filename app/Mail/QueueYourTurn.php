<?php

namespace App\Mail;

use App\Models\Queue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class QueueYourTurn extends Mailable
{
    private Queue $queueModel;

    public function __construct(Queue $queue)
    {
        $this->queueModel = $queue;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🐾 Sekarang Giliran Anda! - PetCare Queue',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.queue-your-turn',
            with: ['queue' => $this->queueModel],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
