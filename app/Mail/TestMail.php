<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($details, $subject, $settings, $style)
    {
        $this->details = $details;
		$this->subject = $subject;
		$this->settings = $settings;
		$this->style = $style;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    /*public function content(): Content
    {
        return new Content(
            view: 'mails.test',
			with: [
                'name' => $this->details['name'],
				'email' => $this->details['email'],
				'phone' => $this->details['phone'],
				'messages' => $this->details['message']
            ],
        );
    }*/
	public function build()
    {
        return $this->view('mails.test')
                    ->with(['details' => $this->details, 'settings' => $this->settings, 'style' => $this->style])
                    ->subject($this->subject);
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
