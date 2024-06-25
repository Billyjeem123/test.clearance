<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $unitName;

    /**
     * Create a new message instance.
     */
    public function __construct($unitName)
    {
        $this->unitName  =  $unitName;
    }

    public function build()
    {
        return $this->subject('New Documents Submitted')
            ->markdown('emails.document_submitted');
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
