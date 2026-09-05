<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('内定通知のお知らせ')
            ->view('emails.consent')
            ->with([
                'user' => $this->applicant->user,
                'job'  => $this->applicant->job
            ]);
    }
}
