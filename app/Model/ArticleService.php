<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ArticleService extends Model
{
	protected $table = 'article_services';

	protected $fillable = [
    	'service', 'title', 'image' ,'article', 'status'
    ];

    protected $primaryKey = 'id';
}
