<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug'];
    public $timestamps = false;

    public function visits()
    {
        return $this->morphMany(Visit::class, 'visitable');
    }
}
