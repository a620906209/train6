<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Illuminate\Support\Facades\Hash;
use Session;


class storeController extends Controller
{
    public function index(){
        return view('store_dashboard');
    }
    public function store_login(Request $request){

        $sql = Store::where('store_acct','=',$request->store_acct)->get();
        foreach($sql as $data);
        if(count($sql)>0){
           if(Hash::check($request->store_pwd, $data['store_pwd'])){
            session()->put('store_name',$data['store_name']);
            return view('store_dashboard');
           }
        }
    }
    public function store_logout(){
        Session::pull('store_name');
        return view('store_dashboard');
    }

    public function edit_store_name(Request $request){
        $store_name = Session::get('store_name');
        Store::where('store_name','=',$store_name)->update(['store_name'=>$request->store_name]);

        return "asd";
    }
}
