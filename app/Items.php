<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = "items";
    protected  $primaryKey = 'item_id';
    protected $fillable = [
    'item_id','itme_name','item_price','item_price','store_id'
    ];

    // public function store()
    // {
    //     return $this->belongsto('App\Store','store_id');
    // }
}
