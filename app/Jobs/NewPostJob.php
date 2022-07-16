<?php

namespace App\Jobs;

use App\Mail\NewPostAlert;
use App\Models\PostEmailNotification;
use SubscriptionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected PostEmailNotification $postEmailNotification;

    protected $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PostEmailNotification $postEmailNotification)
    {
        $this->postEmailNotification = $postEmailNotification;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new NewPostAlert($this->postEmailNotification->post);
        Mail::to($this->postEmailNotification->user['email'])->send($email);
        SubscriptionService::updateSentStatus($this->postEmailNotification);
    }
}
