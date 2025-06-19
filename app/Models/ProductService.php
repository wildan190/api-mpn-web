<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    protected $fillable = [
        'product_name',
        'product_description',
        'status',
        'upload_picture',
    ];
}
