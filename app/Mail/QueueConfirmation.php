<?php

namespace App\Mail;

use App\Models\Queue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QueueConfirmation extends Mailable
{
    use SerializesModels;

    public function __construct(
        public Queue $queue,
        public int $totalAhead
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Konfirmasi Antrian #{$this->queue->queue_number} - PetCare Queue",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.queue-confirmation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
