<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $table = "store";
    protected  $primaryKey = 'store_id';
    protected $fillable = [
    'store_id','store_name','store_acct','store_pwd','status','sales_id'
    ];
}
