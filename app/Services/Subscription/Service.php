<?php
declare(strict_types=1);

namespace App\Services\Subscription;

use App\Models\Post;
use App\Notifications\NewPost;

class Service
{
    public function sendEmail(Post $post)
    {
        $subscriptions = $post->website->subscriptions()->get();
        foreach ($subscriptions as $subscription) {
            $subscription->user->notify(new NewPost($post));
        }
    }
}
