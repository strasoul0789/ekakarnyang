<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ShockModel extends Model
{
    protected $table = 'shockmodels';
    protected $fillable = [
     'brand_id', 'model', 'image', 'status'
    ];
    protected $primaryKey = 'id';
}

