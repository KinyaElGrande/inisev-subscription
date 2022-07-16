<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function emailNotifications()
    {
        return $this->hasMany(PostEmailNotification::class);
    }
}
