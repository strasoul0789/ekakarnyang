<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Tyreproduct extends Model
{
    protected $table = 'tyreproducts';
    protected $fillable = [
    'category_id','subcategory_id', 'width', 'ratio', 'diameter', 'model_id', 'price','cost_prices', 'detail', 'image', 'status'
    ];
    protected $primaryKey = 'tyre_id';
}
