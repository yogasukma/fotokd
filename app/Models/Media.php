<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = [
        'post_guid', 'filename', 'description', 'author',
    ];

    public function getPermalinkAttribute()
    {
        return Storage::url(
            sprintf('images/%s/%s',
                $this->getAttribute('post_guid'),
                $this->getAttribute('filename')
            )
        );
    }
}
