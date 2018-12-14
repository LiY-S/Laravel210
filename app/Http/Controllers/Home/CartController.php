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


        // dump($data);
        return view('home.cart.index',[
            'title'=>'购物车'
        ]);
    }

    public function shopcart(Request $request)
    {
        $id = $request->gid;
        // dd($id);

        $res = DB::table('shop_cart')->where('id',$id)->delete();

        if($res){

            echo 1;
        } else {

            echo 0;
        }
    }
    public function tian(Request $request, $id)
    {
        // dd($request->all());
        $data = $request ->except('_token');
        $good = DB::table('shop_goods') ->where('id',$id)->first();
        // dd($good);
        $data['goods_name'] = $good->goods_name;
        // $data['goods_size'] = $good->goods_size;
        $data['goods_prices'] = $good->goods_price * $data['goods_count'];
        $data['goods_id'] = $id;
        $data['user_id'] = session('user');
        $res = DB::table('shop_cart') ->insert($data);
        if ($res) {
            return view('home.cart.index',[
                'title'=>'购物车'
            ]);
        } else {
            return back();
        }
    }
    public function nullcart()
    {
        return view('home.cart.nullcart',['title'=>'购物车']);
    }


    public function ajaxjiesuan(Request $request)
    {
        $data = $request->data;
        // dd($data);
        $res = [];
        foreach ($data as $key => $value) {
            $chafen = explode('.', $value);
            $ke = $chafen[0];
            $zhi = $chafen[1];
            $res[$ke] = $zhi;
        }
        // dd($res);
        session(['gouwuche'=>$res]);
        return '1';
    }
}
