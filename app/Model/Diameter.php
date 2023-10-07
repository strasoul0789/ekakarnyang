<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Diameter extends Model
{
    protected $table = 'diameters';
    protected $fillable = [
     'diameter', 'width_id', 'ratio_id', 
    ];
    protected $primaryKey = 'id';
}

