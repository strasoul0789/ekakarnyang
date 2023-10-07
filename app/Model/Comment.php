<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
     'branch_comment', 'date', 'comment',
    ];
    protected $primaryKey = 'id';
}
