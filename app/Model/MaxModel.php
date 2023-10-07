<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class MaxModel extends Model
{
    protected $table = 'maxmodels';
    protected $fillable = [
     'brand_id', 'model', 'image', 'status'
    ];
    protected $primaryKey = 'id';
}

