<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotAdoptedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $targetJob;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $job)
    {
        $this->user = $user;
        $this->targetJob = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('不採用通知のお知らせ')
            ->view('emails.not_adopted')
            ->with([
                'user' => $this->user,
                'job'  => $this->targetJob
            ]);
    }
}
