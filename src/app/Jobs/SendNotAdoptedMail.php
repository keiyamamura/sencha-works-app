<?php

namespace App\Jobs;

use App\Mail\NotAdoptedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotAdoptedMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $job;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $job)
    {
        $this->user = $user;
        $this->job = $job;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new NotAdoptedMail($this->user, $this->job));
    }
}
