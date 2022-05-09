<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $item_name;
    public $item_qty;
    public $item_price;
    public $total;
    public $bonus;
}
