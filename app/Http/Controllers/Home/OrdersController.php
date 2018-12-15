<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use DB;
use Session;

class OrdersController extends Controller
{
    //
    public function order(Request $request)
    {
        //dd($request->all());

        $addr = $request->input('dizhi');

        $ids = $request->input('ids');

        // dump($ids);

        $count = $request->input('count');

        $user_id['user_id'] = session('user');

        $uid = $user_id['user_id'];

        // dump($uid);

        $code = "dz_".time().rand();

        $time = time();

        $price = $request->input('price');

        $goods_name = $request->input('gname');
        // dump($goods_name);

        $goods_pic = $request->input('pic');

        //dd($goods_pic);

        $size = $request->input('size');
        // dump($size);

        $addr = $addr[0];
        // dd($addr);
        // $add = DB::table('shop_address') ->where('id',$addr) -> first();
        // dd($add);
        // echo '<pre>';

        for($i=0; $i<count($ids); $i++){

            $data=array();

            $data['code']=$code;
            $data['user_id']=$uid;
            $data['goods_id']=$ids[$i];
            $data['goods_name']=$goods_name[$i];
            $data['size']=$size[$i];
            $data['count']=$count[$i];
            $data['goods_prices']=$price[$i];
            $data['addr']=$addr;
            $data['status']=1;
            $data['create_time']=$time;
            $data['goods_pic']=$goods_pic[$i];
            //dd($data);

            DB::table('shop_order')->insert($data);

            //$shop = session('shop');

            //dd($shop);

        }


            /*$shop = DB::table('shop_cart')->pluck('goods_id');

            //dd($shop);

            foreach ($shop as $key => $value) {

               foreach ($ids as $k => $v) {

                   if ($v==$value['id']) {

                       unset($shop[$key]);
                   }
               }
            }
*/

    return redirect("/home/pay/$code");

    }

    public function pay($code)
    {
        //dd($code);
        return view("home.order.pay");
    }

    public function mylist(Request $request)
    {
        $user_id = session('user');
        //dd($user_id);
        $dat = DB::table('shop_order')->where('user_id',$user_id)->get();
        // dd($dat);
        $dz = DB::table('shop_address')->where('user_id',$user_id)->get();
        //dd($dz);



        // $zt = DB::table('orderstu')->where('id',$sid['id'])->get();

        // dd($zt);

        return view("home.order.mylist",['dat'=>$dat, 'dz'=>$dz]);
    }

    public function status(Request $request)
    {

    }
}
