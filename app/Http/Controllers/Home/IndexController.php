<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    //
    public function index(){

    	$res = DB::table('shop_ad')->get();
    	// dd($res);
    	$zs=count($res);
    	// dd($zs);
    	
        return view('home.sy.index',[
            'title' => '淘鞋吧',
            'res'=>$res,
            'zs'=>$zs
        ]);
    }

}
