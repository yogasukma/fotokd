<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'guid', 'title', 'url', 'published_at',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'post_guid', 'guid');
    }

    public function featuredMedia()
    {
        return $this->hasOne(Media::class, 'post_guid', 'guid');
    }
}
