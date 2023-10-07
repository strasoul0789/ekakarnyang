<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BrakeSalePrice extends Model
{
	protected $table = 'brake_sale_prices';

	protected $fillable = [
    	'admin_id', 'brake_id', 'price', 'status'
    ];

    protected $primaryKey = 'id';
}
