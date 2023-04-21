<?php

namespace App\Notifications;

use App\Mail\ResetPasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Notification;

class CustomResetPassword extends ResetPassword
{
	use Queueable;

	/**
	 * Create a new notification instance.
	 */
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

	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail($notifiable): ResetPasswordMail
	{
		return (new ResetPasswordMail($this->verificationUrl))
		->to($notifiable->email)
		->withVerificationUrl($this->verificationUrl);
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(object $notifiable): array
	{
		return [
		];
	}
}
