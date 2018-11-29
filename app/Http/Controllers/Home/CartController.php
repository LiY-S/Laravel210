<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Cart;
use DB;

class CartController extends Controller
{
    //
    public function index(Request $request)
    {
        // 判断是否存在session
        if(!session('user')){
            return redirect('/home/login');
        }
        // 查询数据库 通过session查询数据库
        $user_id = session('user');
        // dd($user_id);
        $data = Cart::where('user_id',$user_id) -> get();
        // 获取商品的id
        // $goodid = $data['goods_id'];
        // 通过商品的id查出商品名称 商品图片 商品属性  商品价格

        // dump($data);
        return view('home.cart.index',[
            'title'=>'购物车',
            'data'=> $data
        ]);
    }

    public function shopcart(Request $request)
    {
        $id = $request->gid;

        $res = DB::table('shop_cart')->where('id',$id)->delete();

        if($res){

            echo 1;
        } else {

            echo 0;
        }
    }
}
