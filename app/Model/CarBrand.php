<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $table = 'carbrands';

    protected $fillable = [
     'brand', 'image', 'status'
    ];

    protected $primaryKey = 'id';
}
