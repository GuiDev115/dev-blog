<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSocialLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'facebook_url', 'instagram_url', 'youtube_url', 'linkedin_url', 'twitter_url', 'github_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
