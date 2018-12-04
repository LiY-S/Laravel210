<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use DB;


class OrderController extends Controller
{

    /**
     * 订单管理主页.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = Order::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $goods_id = $request->input('goods_id');
                //如果用户名不为空
                if(!empty($goods_id)) {
                    $query->where('goods_id','like',$goods_id);
                }

            })
            // pageinate  分页  每页显示多少条数
        ->paginate();

        return view('admin.order.index',[
            'title'=>'订单管理主页',
            'res'=>$res,
            'request'=>$request
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect('/admin/order');
    }

    public function show($id)
    {

    }
}
