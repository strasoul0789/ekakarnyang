<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Brake extends Model
{
	protected $table = 'brakes';

	protected $fillable = [
    	'admin_id', 'brand_id', 'model_id', 'year' ,'code', 'brand', 'name', 'status'
    ];

    protected $primaryKey = 'id';
}
