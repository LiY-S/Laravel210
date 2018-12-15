<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use DB;


class OrderController extends Controller
{
    public function lists(Request $request)
    {
        //获取订单号
        $code = $request->input('code');
        //echo $code;
        //查询订单号下的所有商品
        $data = DB::table('shop_order')->where("code",$code)->get();

        $res = Order::orderBy('code','asc')
            ->where(function($query) use($request){
                //检测关键字
                $code = $request->input('code');
                //如果用户名不为空
                if(!empty($code)) {
                    $query->where('code','like','%'.$code.'%');
                }

            })
            // pageinate  分页  每页显示多少条数
        ->paginate(10);

        //dd($data);
        //数据展示到界面
        return view('admin.order.lists',[
            'title'=>'订单详情页',
            'data'=>$data
        ]);
    }

    /**
     * 订单管理主页.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = DB::table('shop_order')->select("shop_order.*","shop_user.username","orderstu.name","shop_address.user_id")
            ->join("shop_user","shop_user.id","=","shop_order.user_id")
            ->join("orderstu","orderstu.id","=","shop_order.status")
            ->join("shop_address","shop_address.id","=","shop_order.addr")
            ->get();

            $newArr = array();
            foreach ($data as $key => $value) {

               $newArr[$value->code]=$value;
            }

            //dd($newArr);

        //dd($data);
        $res = Order::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $code = $request->input('code');
                //如果用户名不为空
                if(!empty($code)) {
                    $query->where('code','like',$code);
                }

            })
            // pageinate  分页  每页显示多少条数
        ->paginate(5);

        return view('admin.order.index',['title'=>'订单管理主页','res'=>$res,'request'=>$request])
                ->with('data',$newArr);
    }

    public function addr()
    {
        //获取数据
        $id = $_GET['id'];
        //查询订单收货地址信息
        $data = DB::table('shop_address')->find($id);

        //dd($data);
        //加载页面
        return view('admin.order.addr',[
            'title'=>'收货地址信息'
            ])->with('data',$data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($_POST) {
            $status=$request->input('status');
            $code=$request->input('code');

            $sql="update shop_order set status=$status where code='$code'";
            //执行sql语句

            if(DB::update($sql)) {

                return redirect('admin/order');
            }else{
                return back();
            }
        } else {

        }


        //dd($status);
        //dd($code);
        //查询所有的订单状态
        $data = DB::table('orderstu')->get();

        //dd($data);
        return view('admin.order.edit',['title'=>'状态修改'])
                ->with('data',$data);
    }

}
