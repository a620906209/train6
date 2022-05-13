<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Items;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Sales;
use App\Order_detail;
use App\Product;
use DB;
use App\Cust;


class storeController extends Controller
{
    public function index(){
        //主頁
        if(Session::get('store_id')){
            $items = Items::where('store_id','=',Session::get('store_id'))->get();
            return view('store_dashboard')->with('items',$items);
        }else{
            return view('store_dashboard');
        }

    }
    public function store_login(Request $request){
        //店家登入
        $sql = Store::where('store_acct','=',$request->store_acct)
        ->where('deleted','=',0)
        ->get();
        foreach($sql as $data);
        if(count($sql)>0){
            if($sql[0]['status'] == "停用"){
                return view('store_dashboard')->with('log','帳號停用');
            }elseif(Hash::check($request->store_pwd, $data['store_pwd'])){
                session()->put('store_id',$data['store_id']);
                session()->put('store_name',$data['store_name']);
                return redirect()->route('store');
           }else{
               return view('store_dashboard')->with('log','密碼錯誤');
           }
        }else{
            return view('store_dashboard')->with('log','帳號錯誤');
        }
    }
    public function store_logout(){
        //店家登出
        Session::pull('store_id');
        Session::pull('store_name');
        return view('store_dashboard');
    }

    public function edit_store_name(Request $request){
        //更改店家名稱
        $store_name = Session::get('store_name');
        if(isset($store_name)){
        Store::where('store_name','=',$store_name)->update(['store_name'=>$request->store_name]);
        session()->put('store_name',$request->store_name);
        return redirect()->route('store');
        }
    }

    public function show_store(){
        //顯示銷售總數
        $store_id = session::get('store_id');
        $sql = DB::table('Order_detail')
        ->join('Items','Order_detail.item_id','=','Items.item_id')
        ->join('Store','Items.store_id','=','Store.store_id')
        ->groupby('item_name')
        ->where('Store.store_id','=',$store_id)
        ->select('item_name',DB::raw('SUM(qty) as total_qty'))
        ->get();
        return view('store_list')->with('sql',$sql);
    }
    public function order_cust(){
        //訂單
        $store_id = session::get('store_id');
        $sql = DB::table('Order_detail')
        ->join('Items','Order_detail.item_id','=','Items.item_id')
        ->join('Store','Items.store_id','=','Store.store_id')
        ->join('Order','Order.order_id','=','Order_detail.order_id')
        ->where('Store.store_id','=',$store_id)
        ->get();
        return view('order_cust')->with('sql',$sql);
    }

    public function cust($id){
        //查詢客戶
        $sql = Cust::find($id);
        return view('cust')->with('cust',$sql);
    }

}
