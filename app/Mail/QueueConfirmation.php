<?php

namespace App\Mail;

use App\Models\Queue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class QueueConfirmation extends Mailable
{
    private Queue $queueModel;
    private int $totalAheadCount;

    public function __construct(Queue $queue, int $totalAhead)
    {
        $this->queueModel      = $queue;
        $this->totalAheadCount = $totalAhead;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Konfirmasi Antrian #{$this->queueModel->queue_number} - PetCare Queue",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.queue-confirmation',
            with: [
                'queue'      => $this->queueModel,
                'totalAhead' => $this->totalAheadCount,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
