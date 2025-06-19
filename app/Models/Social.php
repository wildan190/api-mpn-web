<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'instagram_link',
        'facebook_link',
        'youtube_link',
    ];
}
