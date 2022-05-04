<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;

class frontPageController extends Controller
{
    public function index(){
        $sql = Items::all();
        $sql2 = Items::find(1);
        dd($sql2);
        return view('front.front_page')->with('items',$sql);
    }
}
