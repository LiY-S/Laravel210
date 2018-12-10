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
    	$gonggao = DB::table('shop_notice') -> get();
        // dd($gonggao);
        return view('home.sy.index',[
            'title' => '淘鞋吧',
            'res'=>$res,
            'zs'=>$zs,
            'gonggao' => $gonggao
        ]);
    }
    public function notice($id)
    {
        $gong = DB::table('shop_notice') -> where('id',$id) -> first();
        return view('home.sy.notice',[
            'title' => '淘鞋吧公告',
            'gong' => $gong
        ]);
    }

}
