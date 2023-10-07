<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Ecoupon extends Model
{
    protected $table = 'ecoupons';

    protected $fillable = [
        'card_id', 'name', 'tel', 'date', 'type', 'comment',
    ];

    protected $primaryKey = 'id';
}
