<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Tyre extends Model
{
	protected $table = 'tyres';

	protected $fillable = [
    	'admin_id', 'brand_id', 'model_id', 'code', 'width', 'ratio', 'diameter', 'status', 'comment'
    ];

    protected $primaryKey = 'id';
}
