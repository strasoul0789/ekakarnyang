<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class EngineOilSalePrice extends Model
{
	protected $table = 'engine_oil_sale_prices';

	protected $fillable = [
    	'admin_id', 'engine_oil_id', 'price', 'status'
    ];

    protected $primaryKey = 'id';
}
