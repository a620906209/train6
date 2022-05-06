<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Sales;
use Session;
use Illuminate\Support\Facades\Hash;

class addStoreController extends Controller
{
    //
    public function index(){
        return view('addStore');
    }
    public function addstore(Request $request){
        $sql = Store::where('store_acct','=',$request->store_acct)->count();
        // dd($sql);
        if($sql < 1){
            $sales_name = Session::get('sales_name', 'default');
            $sales = Sales::where('sales_name','=',$sales_name)->get();
            foreach($sales as $sale);

            $store = new Store;
            $store -> store_acct = $request->store_acct;
            $store -> store_name = $request->store_name;
            $store -> store_pwd = Hash::make($request->store_pwd);
            $store -> sales_id = $sale->sales_id;
            $store -> status = "啟用";
            $store->save();
            return redirect()->route('index');
        }else{
            return "帳號已註冊";
        }


    }
}
