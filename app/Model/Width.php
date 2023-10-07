<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Width extends Model
{
    protected $table = 'widths';
    protected $fillable = [
     'width',
    ];
    protected $primaryKey = 'id';
}
