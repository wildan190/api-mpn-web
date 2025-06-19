<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'header_image',
        'slug',
        'date',
        'article_body_image',
        'alt_body_image',
        'article_body',
        'status',
        'seo_title',
        'seo_description',
        'keywords',
    ];
}
