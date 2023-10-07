<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class StaffStatistic extends Model
{
	protected $table = 'staff_statistics';

	protected $fillable = [
    	'staff_id', 'date'
    ];

    protected $primaryKey = 'id';
}
