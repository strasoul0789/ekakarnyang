<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class MaxProduct extends Model
{
    protected $table = 'maxproducts';
    protected $fillable = [
        'brand_id','model_id', 'size', 'model', 'price', 'image', 'status'
    ];
    protected $primaryKey = 'id';
}
