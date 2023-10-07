<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BookingCovid extends Model
{
	protected $table = 'booking_covids';

	protected $fillable = [
		'brand','model','size', 'price', 'service', 'card_id', 'name', 'surname','bday', 'tel', 'address', 'moo', 'village', 'road', 'district', 'amphoe', 'province', 'zipcode', 'image', 'code','comment','carnumber','carbrand','carmodel','carcolor'
	];

    protected $primaryKey = 'id';
}
