<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Services\CheckForm;

class ApplicantMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $owner;
    public $gender;
    public $age;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $owner)
    {
        $this->user  = $user;
        $this->owner = $owner;
        $this->gender = CheckForm::gender($user->gender);
        $this->age    = CheckForm::age($user->age);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('求人応募のお知らせ')
            ->view('emails.applicant')
            ->with([
                'user'   => $this->user,
                'owner'  => $this->owner,
                'gender' => $this->gender,
                'age'    => $this->age
            ]);
    }
}
