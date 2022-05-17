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

class loginController extends Controller
{
    public function login(Request $request){
        //登入業務帳號
        $check_acct = Sales::where('sales_acct','=',$request->sales_acct)->get();
        foreach($check_acct as $data);
        if(count($check_acct) > 0){
            if($data['sales_pwd'] == $request->sales_pwd){
                session()->put('sales_name',$data['sales_name']);
                session()->put('sales_id',$data['sales_id']);
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
                return view('login')->with('log',"密碼錯誤");
            }
        }else{
            return view('login')->with('log',"帳號有誤");
        }
    }
    public function logout(){
        //登出業務帳號
        Session::pull('sales_name');
        Session::pull('sales_id');
        return view('login');
    }
    public function disable(Request $request){
        //停用店家帳號
        $sales_id = Session::get('sales_id');
        $sql = Store::where('store_acct','=',$request->store_acct)->where('sales_id','=',$sales_id)->get();

        if(count($sql) > 0){
            if($sql[0]['status'] == "停用"){
                return view('login')->with('log','已經停用');
            }else{
                Store::where('store_acct','=',$request->store_acct)->update(['status'=>"停用"]);
                return view('login')->with('log','停用成功');
            }
        }else{
            return  view('login')->with('log','帳號不存在');
        }
    }
    public function enable(Request $request){
        //啟用店家帳號
        $sales_id = Session::get('sales_id');
        $sql = Store::where('store_acct','=',$request->store_acct)->where('sales_id','=',$sales_id)->get();
        if(count($sql) > 0){
            if($sql[0]['status'] == "啟用"){
                return view('login')->with('log','已經啟用');
            }else{
                Store::where('store_acct','=',$request->store_acct)->update(['status'=>"啟用"]);
                return view('login')->with('log','啟用成功');
            }
        }else{
            return  view('login')->with('log','帳號不存在');
        }
    }
    public function delete(Request $request){
        //刪除帳號
        $store_acct =$request ->store_acct;
        $sales_id = Session::get('sales_id');
        $sql = Store::where('store_acct','=',$store_acct)->where('sales_id','=',$sales_id)->first();
        if($sql){
            $sql -> deleted = 1;
            $sql-> status = "停用";
            $sql-> save();
            return view('login')->with('log','停用成功');
        }else{
            return view('login')->with('log','停用失敗');
        }
    }
    public function recovery(Request $request){
        //刪除回復
        $store_acct =$request ->store_acct;
        $sales_id = Session::get('sales_id');
        $sql = Store::where('store_acct','=',$store_acct)->where('sales_id','=',$sales_id)->first();
        // dd($sql);
        if($sql != null){
            $sql-> status = "啟用";
            $sql->deleted = 0;
            $sql ->save();
            return view('login')->with('log','恢復成功');
        }else{
            return view('login')->with('log','恢復失敗');
        }

    }

}
