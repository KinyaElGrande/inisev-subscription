<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
    ];

    public function subscriptions()
    {
        return $this->hasMany(WebsiteSubscription::class);
    }

    public function emailNotifications()
    {
        return $this->hasMany(PostEmailNotification::class);
    }
}
