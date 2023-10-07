<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Model_ extends Model
{
	protected $table = 'models';

	protected $fillable = [
    	'brand_id', 'model', 'status', 'runflat', 'type_tyre', 'image'
    ];

    protected $primaryKey = 'id';
}
