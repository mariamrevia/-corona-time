<?php

namespace App\Notifications;

use App\Mail\ResetPasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends ResetPassword
{
	use Queueable;

	public $verificationUrl;

	public function __construct(string $verificationUrl)
	{
		$this->verificationUrl = $verificationUrl;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @return array<int, string>
	 */
	public function via($notifiable): array
	{
		return ['mail'];
	}

	public function toMail($notifiable): ResetPasswordMail
	{
		return (new ResetPasswordMail($this->verificationUrl))
		->to($notifiable->email)
		->withVerificationUrl($this->verificationUrl);
	}
}
