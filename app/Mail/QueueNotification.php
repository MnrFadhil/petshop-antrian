<?php

namespace App\Mail;

use App\Models\Queue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QueueNotification extends Mailable
{
    use SerializesModels;

    public function __construct(public Queue $queue) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⚡ Giliranmu Hampir Tiba! - PetCare Queue',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.queue-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
