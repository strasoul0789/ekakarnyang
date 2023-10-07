<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GalleryCarBrand extends Model
{
	protected $table = 'gallery_car_brands';

	protected $fillable = [
    	'brand','image'
    ];

    protected $primaryKey = 'id';
}
