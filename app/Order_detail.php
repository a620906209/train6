<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = "order_detail";
    protected $fillable = [
    'detail_id','order_id','qty','item_id'
    ];
}
