<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ArticleProduct extends Model
{
	protected $table = 'article_products';

	protected $fillable = [
    	'product', 'title', 'image' ,'article', 'status'
    ];

    protected $primaryKey = 'id';
}
