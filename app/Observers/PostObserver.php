<?php

namespace App\Observers;

use App\Models\Post;
use App\Notifications\NewPost;
use Illuminate\Support\Facades\Notification;

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
        $subscriptions = $post->website->subscriptions()->get();
        foreach ($subscriptions as $subscription) {
            $subscription->user->notify(new NewPost($post));
        }
    }

}
