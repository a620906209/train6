<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Items;
use Illuminate\Support\Facades\Hash;
use Session;


class storeController extends Controller
{
    public function index(){
        //主頁
        if(Session::get('store_id')){
            $items = Items::where('store_id','=',Session::get('store_id'))->get();
            return view('store_dashboard')->with('items',$items);
        }

    }
    public function store_login(Request $request){
        //店家登入
        $sql = Store::where('store_acct','=',$request->store_acct)->get();
        foreach($sql as $data);
        if(count($sql)>0){
           if(Hash::check($request->store_pwd, $data['store_pwd'])){
            session()->put('store_id',$data['store_id']);
            session()->put('store_name',$data['store_name']);
            return redirect()->route('store');
           }
        }
    }
    public function store_logout(){
        //店家登出
        Session::pull('store_id');
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
}
