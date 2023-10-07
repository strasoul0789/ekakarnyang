<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TyreSalePrice extends Model
{
	protected $table = 'tyre_sale_prices';

	protected $fillable = [
    	'admin_id', 'tyre_id', 'price', 'status', 'comment'
    ];

    protected $primaryKey = 'id';
}
