<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactMessage $contactMessage
    ) {}

    public function envelope(): Envelope
    {
        $subject = $this->contactMessage->subject
            ? 'Nouveau message : '.$this->contactMessage->subject
            : 'Nouveau message depuis le site GIGABITS';

        return new Envelope(
            subject: $subject,
            replyTo: $this->contactMessage->email
                ? [new Address($this->contactMessage->email, $this->contactMessage->name)]
                : [],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.submitted',
        );
    }
}
