<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Items;
use App\Order;
use App\Order_detail;
use App\Cust;

class orderController extends Controller
{
    public function index(Request $request){
        $cust_id = $request['cust_id'];
        $check_cust = Cust::where('cust_id','=',$cust_id)->count();
        if($check_cust){
                $res = $request->all();
                unset($res['cust_id']);
                unset($res['cust_name']);
                $sql = Items::all();
                foreach($sql as $item)
                $tmp=[];
                for($i=0; $i<count($sql);$i++){
                    $tmp[$sql[$i]['item_id']] = $sql[$i]['item_price'];
                }
                $total= 0;
                foreach($res as $key=>$value){
                    if($value>0){
                    $item_id = $key;
                    $price = $tmp[$key];
                    $qty = $value;
                    $total = $total + $price * $qty;
                    }
                }
                //新增訂單
                if($total > 0){
                    $order = new Order;
                    $order -> cust_id = $cust_id;
                    $order ->order_total = $total;
                    $order->save();
                //新增訂單明細
                    foreach($res as $key=>$value){
                        if($value>0){
                            $item_id = $key;
                            $price = $tmp[$key];
                            $qty = $value;
                            $order_detail = new Order_detail;
                            $order_detail -> order_id = $order->order_id;
                            $order_detail -> qty = $qty;
                            $order_detail -> item_id = $key;
                            $order_detail ->save();
                        }
                    }
                }
                return redirect()->route('front_page');
            }else{
                return redirect()->route('front_page');
            }


    }



}
