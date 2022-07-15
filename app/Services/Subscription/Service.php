<?php
declare(strict_types=1);

namespace App\Services\Subscription;

use App\Models\Post;
use App\Notifications\NewPost;

class Service
{
    public function sendEmailNotification(Post $post)
    {
        $post->website->subscriptions()->chunk(100, function ($subscriptions) use ($post) {
            $subscriptions->each(function ($subscription) use ($post) {
                $subscription->user->notify(new NewPost($post));
            });
        });
    }
}
