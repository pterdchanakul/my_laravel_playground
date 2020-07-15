<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'order_number',
        'buyer',
        'seller',
        'product_name',
        'amount',
        'total_price'
    ];
}
