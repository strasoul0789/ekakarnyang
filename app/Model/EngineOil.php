<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class EngineOil extends Model
{
	protected $table = 'engine_oils';

	protected $fillable = [
    	'admin_id', 'brand_id', 'model_id', 'year' ,'code', 'brand', 'name', 'status'
    ];

    protected $primaryKey = 'id';
}
