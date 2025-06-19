<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $fillable = [
        'mitra_logo',
        'mitra_name',
        'mitra_description',
        'web_link',
    ];
}
