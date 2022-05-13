<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Store;
use App\Items;
use App\Order_detail;
use App\Product;
use Session;
use DB;
class homeController extends Controller
{
    function index(){
        if(session::get('sales_name')){
        //顯示銷售狀況
        $sales_id = Session::get('sales_id');
        $sql = DB::table('Order_detail')
        ->join('Items','Order_detail.item_id','=','Items.item_id')
        ->join('Store','Items.store_id','=','Store.store_id')
        ->join('Sales','Store.sales_id','=','Sales.sales_id')
        ->where('sales.sales_id','=',$sales_id )
        ->groupby('Order_detail.item_id')
        ->orderby('Order_detail.item_id','desc')
        ->select('Items.item_name',DB::raw('SUM(qty) as total_qty'),'Order_detail.item_id')
        ->get();
        //業務獎金
        $sql_bonus = DB::table('Order_detail')
        ->join('Items','Order_detail.item_id','=','Items.item_id')
        ->join('Store','Items.store_id','=','Store.store_id')
        ->join('Sales','Store.sales_id','=','Sales.sales_id')
        ->where('sales.sales_id','=',$sales_id )
        ->get();
        $bonus = 0;
        foreach($sql_bonus as $data){
            $bonus = $data->detail_total +$bonus;
        };
        return view('login')->with('product',$sql)->with('bonus',floor($bonus*0.1));
    }else{
        return view('login');
    }

    }
}
