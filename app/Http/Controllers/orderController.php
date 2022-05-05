<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Items;

class orderController extends Controller
{
    public function index(Request $request){

        $res = $request->all();

        $tmp_arr = $res;
        $tmp_id = array_splice($res,0,(count($res)-2)/2 );

        $tmp_qty = array_splice($tmp_arr,(count($tmp_arr)-2)/2,(count($tmp_arr)-2)/2 );

        $order_qty =[];
        foreach($tmp_qty as $key =>$qty)
        array_push($order_qty,$qty);

        $order_id =[];
        foreach($tmp_id as $key =>$id)
        array_push($order_id,$id);

        $order = [];

        $a=[];

        for($i = 0;$i<count($order_id);$i++){
            if($order_qty[$i] <> 0){
                $a = array((string)$order_id[$i] => (string)$order_qty[$i]);
                array_push($order,$a);
            }
        }
        item_search(12);

        return $order;
    }

}
