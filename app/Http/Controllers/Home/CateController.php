<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;
use App\Model\Admin\Goods;
use App\Model\Admin\Color;
use DB;

class CateController extends Controller
{
    /**
     * 显示分类页面
     */
    public function index(Request $request,$id)
    {
    	$cate = Cate::select()->get();
    	$goods = DB::table('shop_goods')
    	->where('cate_id',$id)
        ->where('status','1')
    	->paginate(9);
        foreach ($goods as $v) {
            $v->size = explode(',',$v->size);
        }
    	$newGoods = DB::table('shop_goods')
                    ->where('status','1')
                  	->orderBy('id', 'desc')
               		->take(3)
                	->get();
        foreach ($newGoods as $v) {
            $color = Color::where('goods_id',$v->id)->get();
            $v->size = explode(',',$v->size);
        }
    	// dump($goods);
    	return view('home.cate.category',[
    		'title'=>'分类页面',
    		'cate'=>$cate,
    		'newGoods'=>$newGoods,
    		'goods'=>$goods,
    		'request'=>$request
    	]);
    }
}
