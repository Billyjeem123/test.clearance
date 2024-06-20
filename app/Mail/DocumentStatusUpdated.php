<?php

namespace App\Mail;

use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $document;
    public $status;


    /**
     * Create a new message instance.
     */
    public function __construct(Document $document, $status)
    {
        $this->document = $document;
        $this->status = $status;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->markdown('emails.document_status_updated')
            ->with([
                'documentId' => $this->document->name,
                'status' => $this->status,
                'unit_name' => $this->document->unit->unit_name
            ])
            ->subject('Document Status Update');
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
