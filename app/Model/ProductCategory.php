<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $fillable = [
    'name','name_eng', 'status'
    ];
    protected $primaryKey = 'id';
}
