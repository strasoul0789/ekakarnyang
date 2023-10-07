<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'carmodels';

    protected $fillable = [
     'model', 'brand_id', 'type_car', 'status'
    ];

    protected $primaryKey = 'id';
}
