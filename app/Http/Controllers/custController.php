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
        $sql_count = Cust::where('user_id','=',$request->user_id)
        ->where('tel','=',$request->tel)
        ->count();
            if($sql_count == 1){
                $sql = Cust::where('user_id','=',$request->user_id)->get();
                foreach($sql as $data);

                session()->put('cust_id',$data['cust_id']);
                session()->put('cust_name',$data['name']);
                return redirect()->route('front_page');
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
