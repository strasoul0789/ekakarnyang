<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Shockproduct extends Model
{
    protected $table = 'shockproducts';

    protected $fillable = [
        'carbrand_id','carmodel', 'brand_id', 'model', 'price', 'image', 'status'
    ];

    protected $primaryKey = 'id';
}
