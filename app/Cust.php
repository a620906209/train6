<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cust extends Model
{
    protected $table = "customer";
    protected  $primaryKey = 'cust_id';
    protected $fillable = [
    'cust_id','cust_name','cust_birth','cust_tel','cust_postalcode','cust_address'
    ];
}
