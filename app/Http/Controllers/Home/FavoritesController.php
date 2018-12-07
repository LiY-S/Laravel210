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
       
        
        

    //     $id = session('user');
    //     $res = Collect::where('user_id',$id) -> get();
    //     // dd($res);die;
    //     $data = [];
    //     foreach ($res as $k => $v) {
    //         $goodid = $v->goods_id;
    //         // dd($goodid);
    //         $data[] = DB::table('shop_goods') -> where('id',$goodid) -> get();
    //     }
    //     // dd($data);

    //     $datas=[];
    //     foreach ($data as $ks => $vs) {
    //         foreach ($vs as $kss => $vss) {
    //             $goodids = $vss->id;
    //             $datas[] = DB::table("shop_goods_color")->where('goods_id',$goodids)->first();
    //         }   
    //     }
    //     foreach ($datas as $key => $value) {
    //         $img = $value->photo;
    //     }
    //     $frist = substr( $img, 0, 36 );
    //     // dd($data);
        
                                // $ph = explode(',',$a);


    //     return view('home.favorites.favorites',[
    //         'title'=>'收藏夹',
    //         'data'=>$data,
    //         'frist'=>$frist,
    //         'request'=>$request
    //         // 're'=>$re
    //     ]);
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
}
