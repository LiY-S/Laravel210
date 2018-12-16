<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Goods;
use App\Model\Admin\Color;


class IndexController extends Controller
{
    //
    public function index()
    {
        $goods = Goods::orderBy(\DB::raw('RAND()'))
                ->where('status','1')
                ->take(4)
                ->get();
        foreach ($goods as $v) {
            $v->size = explode(',',$v->size);
        }
        $newGoods = DB::table('shop_goods')
                    ->where('status','1')
                    ->orderBy('id', 'desc')
                    ->first();
                    // dump($newGoods);
        $newGoods->size = explode(',',$newGoods->size);
        // dump($newGoods);
        // dump($goods);
    	$res = DB::table('shop_ad')->get();
    	// dd($res);
    	$zs=count($res);
    	// dd($zs);
    	$gonggao = DB::table('shop_notice') -> get();
        // dd($gonggao);
        $conf = DB::table('shop_conf')->first();
        return view('home.sy.index',[
            'title' => $conf->c_name,
            'res'=>$res,
            'zs'=>$zs,
            'gonggao' => $gonggao,
            'goods'=>$goods,
            'newGoods'=>$newGoods
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
