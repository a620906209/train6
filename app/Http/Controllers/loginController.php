<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Store;
use Session;


class loginController extends Controller
{
    public function login(Request $request){
        $check_acct = Sales::where('sales_acct','=',$request->sales_acct)->get();
        foreach($check_acct as $data);
        if(count($check_acct) > 0){
            if($data['sales_pwd'] == $request->sales_pwd){
                session()->put('sales_name',$data['sales_name']);
                return view('login');
            }else{
                return "密碼錯誤";
            }
        }else{
            return "帳號錯誤";
        }
    }
    public function logout(){
        Session::pull('sales_name');
        return view('login');
    }
    public function disable(Request $request){
        $sql = Store::where('store_acct','=',$request->store_acct)->get();
        if(count($sql) > 0){
            Store::where('store_acct','=',$request->store_acct)->update(['status'=>"啟用"]);
            return view('login')->with('log','停用成功');
        }else{
            return  view('login')->with('log','帳號不存在');
        }
    }
}
