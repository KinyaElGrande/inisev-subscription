<?php

namespace App\Observers;

use App\Models\Post;
use SubscriptionService;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post)
    {
       SubscriptionService::sendEmailNotification($post);
    }

}
