<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Batteryproduct extends Model
{
    protected $table = 'batteryproducts';
    protected $fillable = [
    'category_id','subcategory', 'price', 'detail', 'image','status'
    ];
    protected $primaryKey = 'id';
}
