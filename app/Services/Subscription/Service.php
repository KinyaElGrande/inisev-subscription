<?php
declare(strict_types=1);

namespace App\Services\Subscription;

use App\Models\Post;
use App\Models\PostEmailNotification;

class Service
{
    public function createPostEmailNotification(Post $post)
    {
        $post->website->subscriptions()->chunk(100, function ($subscriptions) use ($post) {
            $subscriptions->each(function ($subscription) use ($post) {
                PostEmailNotification::create([
                    'post_id' => $post['id'],
                    'user_id' => $subscription->user['id'],
                ]);
            });
        });
    }

    public function updateSentStatus(PostEmailNotification $notification)
    {
        $notification->sent = true;
        $notification->save();
    }
}
