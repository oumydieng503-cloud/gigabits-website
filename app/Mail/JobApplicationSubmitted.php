<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public JobApplication $application
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle candidature ('.$this->application->typeLabel().') — '.$this->application->name,
            replyTo: [
                new Address($this->application->email, $this->application->name),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.careers.submitted',
        );
    }
}
