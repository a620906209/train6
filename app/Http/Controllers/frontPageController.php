<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Store;
use DB;

class frontPageController extends Controller
{
    public function index(){
        $sql2 = DB::table('Items')
        ->join('Store','Items.store_id','=','Store.store_id')
        ->where('status','=','啟用')
        ->orderby('store_name')
        ->get();
        return view('front.front_page')->with('items',$sql2);
    }
    public function show($id){
        $sql2 = DB::table('Items')
        ->join('Store','Items.store_id','=','Store.store_id')
        ->where('status','=','啟用')
        ->where('Store.store_id','=',$id)
        ->orderby('store_name')
        ->get();
        return view('front.front_page')->with('items',$sql2);
    }


}
