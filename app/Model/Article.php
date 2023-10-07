<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';

	protected $fillable = [
    	'title', 'image' ,'article', 'status'
    ];

    protected $primaryKey = 'id';
}
