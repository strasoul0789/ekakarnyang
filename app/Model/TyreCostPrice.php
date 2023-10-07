<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TyreCostPrice extends Model
{
	protected $table = 'tyre_cost_prices';

	protected $fillable = [
    	'admin_id', 'tyre_id', 'cost_price', 'status', 'comment'
    ];

    protected $primaryKey = 'id';
}
