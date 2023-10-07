<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product_models';

    protected $fillable = [
    'category_id', 'subcategory_id', 'model', 'image'
    ];

    protected $primaryKey = 'id';
}
