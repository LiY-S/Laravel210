<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Collect;
use App\Model\Admin\Goods;
use DB;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $user_id = session('user');
        
        if (!empty($request->goods_name)) {
            $r = $request->goods_name;
            // dd($r);
            // $data = DB::table('shop_goods')->join('shop_collect','goods_id','=','shop_goods.id')->where('user_id',$user_id)->where('goods_name','like','%'.$request->goods_name.'%')->get();
            $data = DB::table('shop_goods')->join('shop_collect','goods_id','=','shop_goods.id')->where('user_id',$user_id)->join('shop_goods_color','shop_goods_color.goods_id','=','shop_goods.id')->where('goods_name','like','%'.$request->goods_name.'%')->paginate(3);

            // dd($data);
             return view('home.favorites.favorites',[

            'title'=>'收藏夹',
            'request'=>$request,
            'data'=>$data
         ]);
            
        }else{

            // $data = DB::table('shop_goods')->join('shop_collect','goods_id','=','shop_goods.id')->where('user_id',$user_id)->get();
             // dd($data);
            $data = DB::table('shop_goods')->join('shop_collect','goods_id','=','shop_goods.id')->where('user_id',$user_id)->join('shop_goods_color','shop_goods_color.goods_id','=','shop_goods.id')->paginate(3);
             // dd($id);

            return view('home.favorites.favorites',[

            'title'=>'收藏夹',
            'request'=>$request,
            'data'=>$data
         ]);

        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->gid;

        $res = DB::table('shop_collect')->where('goods_id',$id)->delete();

        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asdfasdf(Request $request)
    {
        $data = [];
        // 商品id
        $data['goods_id'] = $request -> gp;
        // 用户id
        $data['user_id'] = session('user');
        // 时间
        $data['collect_time'] = time();
        $re = DB::table('shop_collect') ->where('goods_id',$data['goods_id']) -> where('user_id',$data['user_id']) ->count();
        // return $re;
        if (!$re) {
            $res = DB::table('shop_collect') -> insert($data);
            if ($res) {
                return 1;
            }
        } else {
            $shan = DB::table('shop_collect') ->where('goods_id',$data['goods_id']) -> where('user_id',$data['user_id'])->delete();
            if ($shan) {
                return 2;
            }
        }
    }
}
