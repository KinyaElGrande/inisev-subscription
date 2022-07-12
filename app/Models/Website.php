<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(WebsiteSubscription::class);
    }

    public function subscribe(User $user)
    {
        return $this->subscriptions()->create([
            'user_id' => $user->id,
        ]);
    }
}
