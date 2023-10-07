<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class MaxBrand extends Model
{
    protected $table = 'maxbrands';
    protected $fillable = [
     'name', 'image', 'status' 
    ];
    protected $primaryKey = 'id';
}

