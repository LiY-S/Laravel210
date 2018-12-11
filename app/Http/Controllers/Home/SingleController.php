<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Cate;
use App\Model\Admin\Color;
use App\Model\Admin\Goods;


class SingleController extends Controller
{
    /**
     * 显示商品详情页面
     */
    public function index($id)
    {
		$cate = Cate::select()->get();
		// dump($cate);
		$res = DB::table('shop_goods')->where('id',$id)->get();
		// dump($res);
		foreach ($res as $v) {
            $color = Color::where('goods_id',$v->id)->get();
            foreach ($color as $key => $value) {
                $v->color = $value->color;
                $v->photo = $value->photo;
            }
            $v->size = explode(',',$v->size);
            $v->photo = explode(',',$v->photo);
        }
        $goods = Goods::orderBy(\DB::raw('RAND()'))
                ->take(4)
                ->get();
        foreach ($goods as $v) {
            $color = Color::where('goods_id',$v->id)->get();
            foreach ($color as $key => $value) {
                $v->color = $value->color;
                $v->photo = $value->photo;
            }
            $v->size = explode(',',$v->size);
            $v->photo = explode(',',$v->photo);
        }
        // dump($res);
    	return view('home.goods.single',[
    		'title'=>'商品详情页面',
    		'cate'=>$cate,
    		'res'=>$res,
            'goods'=>$goods
    	]);
    }
}
