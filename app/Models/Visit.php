<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = ['visitable_type', 'visitable_id', 'ip_address'];

    public function visitable()
    {
        return $this->morphTo();
    }
}
