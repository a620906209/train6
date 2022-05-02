<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = "sales";
    protected $fillable = [
    'sales_id','sales_name','sales_acct','sales_pwd'
    ];
    public $timestamps = true;
}
