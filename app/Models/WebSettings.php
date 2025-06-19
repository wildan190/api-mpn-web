<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSettings extends Model
{
    protected $fillable = [
        'upload_logo',
        'name',
        'about_us',
        'email',
        'phone',
        'whatsapp',
        'address',
    ];
}
