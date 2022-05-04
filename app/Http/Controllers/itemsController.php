<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Session;

class itemsController extends Controller
{
    public function index(){
        return view('items');
    }
    public function item_add(Request $request){
        if($request){
            $sql = Items::where('item_name','=',$request->item_name)->get()->count();
            if($sql == 0){
                //商品無重複直接新增
                $Item = new Items;
                $Item -> item_name = $request -> item_name;
                $Item -> item_price = $request -> item_price;
                $Item -> store_id = $request -> store_id;
                $Item->save();
                return redirect()->route('store');
            }elseif($sql>0){
                //商品重複
                $same_items = Items::where('store_id','=',$request->store_id)->where('item_name','=',$request->item_name)->get()->count();
                if($same_items > 0){
                //商品重複且和店家商品重複
                    return view('items')->with('log','商品重複');
                }else{
                //和其他店家沒有重複
                    $Item = new Items;
                    $Item -> item_name = $request -> item_name;
                    $Item -> item_price = $request -> item_price;
                    $Item -> store_id = $request -> store_id;
                    $Item->save();
                    return redirect()->route('store');
                }
            }
        }
    }
    public function item_delete(Request $request){
        //刪除商品
        $sql = Items::where('item_id','=',$request->item_id)->get();
        if($sql){
            Items::where('item_id','=',$request->item_id)->delete();
            return redirect()->route('store');
        }else{
            return view('store')->with('log','資料錯誤');
        }
    }
    public function item_update_page(Request $request){
        //傳資料到更新頁面
        $sql = Items::where('item_id','=',$request->item_id)->get();
        return view('item_update')->with('items',$sql);
    }
    public function item_update(Request $request){
        //更新商品
        if($request){
            Items::where('item_id','=',$request->item_id)->update(['item_name'=> $request->item_name,'item_price' => $request->item_price]);
            return redirect()->route('store');
        }
    }
}
