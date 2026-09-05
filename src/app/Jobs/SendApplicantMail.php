<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ApplicantMail;
use Illuminate\Support\Facades\Mail;

class SendApplicantMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $owner;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $owner)
    {
        $this->user = $user;
        $this->owner = $owner;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->owner)->send(new ApplicantMail($this->user, $this->owner));
    }
}
