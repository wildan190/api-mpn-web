<?php

namespace App\Models;
use App\Models\Visit;

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

    public function visits()
    {
        return $this->morphMany(Visit::class, 'visitable');
    }

    public function visitCount()
    {
        return $this->visits()->count();
    }
}
