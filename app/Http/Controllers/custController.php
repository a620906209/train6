<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cust;
use Illuminate\Support\Facades\Hash;
use Session;

class custController extends Controller
{
    //
    public function index(){
        return view('front.cust_login');
    }

    public function cust_login(Request $request){
        //客戶登入
        $sql_count = Cust::where('cust_acct','=',$request->cust_acct)->count();
        $sql = Cust::where('cust_acct','=',$request->cust_acct)->get();
        foreach($sql as $data);

            if(count($sql)>=1){
                if(Hash::check($request->cust_pwd,$data['cust_pwd'])){
                    session()->put('cust_id',$data['cust_id']);
                    session()->put('cust_name',$data['name']);
                    return redirect()->route('front_page');
                }else{
                    return view('front.cust_login')->with('log','密碼錯誤');
                }
            }else{
                return view('front.cust_login')->with('log','登入錯誤');
            }
    }
    public function cust_logout(){
        session()->pull('cust_id');
        session()->pull('cust_name');
        return view('front.cust_login')->with('log','登出成功');
    }


}
