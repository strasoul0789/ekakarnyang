<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    protected $table = 'product_brands';

    protected $fillable = [
    'category_id', 'brand', 'image', 'logo'
    ];

    protected $primaryKey = 'id';
}
