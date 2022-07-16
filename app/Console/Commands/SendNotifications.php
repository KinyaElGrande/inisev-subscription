<?php

namespace App\Console\Commands;

use App\Jobs\NewPostJob;
use App\Models\PostEmailNotification;
use Illuminate\Console\Command;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
     return  PostEmailNotification::where('sent', false)->chunk(100, function ($notifications) {
        foreach ($notifications as $notification) {
          NewPostJob::dispatch($notification);
        }
      });
    }
}
