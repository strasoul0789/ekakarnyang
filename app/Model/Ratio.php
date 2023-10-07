<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Ratio extends Model
{
    protected $table = 'ratios';
    protected $fillable = [
     'ratio', 'width_id',
    ];
    protected $primaryKey = 'id';
}

