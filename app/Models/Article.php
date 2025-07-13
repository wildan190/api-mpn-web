<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'header_image', 'slug', 'date', 'article_body_image', 'alt_body_image', 'article_body', 'status', 'seo_title', 'seo_description', 'keywords', 'category_id'];

    public function visits()
    {
        return $this->morphMany(Visit::class, 'visitable');
    }

    public function visitCount()
    {
        return $this->visits()->count();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
