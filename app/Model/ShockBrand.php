<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ShockBrand extends Model
{
    protected $table = 'shockbrands';
    protected $fillable = [
        'category_id', 'brand', 'image', 'status' 
    ];
    protected $primaryKey = 'id';
}

