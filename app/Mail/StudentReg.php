<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentReg extends Mailable
{
    use Queueable, SerializesModels;

    public mixed $matricNumber;

    /**
     * Create a new message instance.
     */
    public function __construct($matricNumber)
    {
        $this->matricNumber = $matricNumber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Student Registration')
            ->view('emails.student_registered')
            ->with([
                'matricNumber' => $this->matricNumber,
            ]);
    }
}
