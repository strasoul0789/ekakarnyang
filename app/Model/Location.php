<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
     'branch', 'location', 'image', 'map'
    ];
    protected $primaryKey = 'id';
}
