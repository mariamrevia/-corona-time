<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
	use Queueable, SerializesModels;

	public $verificationUrl;

	/**
	 * Create a new message instance.
	 */
	public function __construct(string $verificationUrl)
	{
		$this->verificationUrl = $verificationUrl;
	}

	/**
	 * Get the message envelope.
	 */
	public function envelope(): Envelope
	{
		return new Envelope(
			subject: 'Confirm Mail',
		);
	}

	/**
	 * Get the message content definition.
	 */
	public function build(): mixed
	{
		return
		$this->markdown('emailnotification.confirmmail')
		->with(['verificationUrl' => $this->verificationUrl]);
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
