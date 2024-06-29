<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentSubmissionNotification extends Mailable
{
    use Queueable, SerializesModels;



    public $notificationMessage;

    /**
     * Create a new message instance.
     *
     * @param string $notificationMessage The message to be sent in the email.
     * @return void
     */
    public function __construct(string $notificationMessage)
    {
        $this->notificationMessage = $notificationMessage;
    }

    public function build()
    {
        return $this->subject('Document Submission Notification')
            ->view('emails.document_submission_notification');
    }
}
