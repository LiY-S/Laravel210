<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use DB;
use Session;


class LoginController extends Controller
{
    //
    public function login()
    {
        return view('home.login.login',['title'=>'登录页面']);
    }
    public function dologin(LoginRequest $request)
    {

        $res = $request ->except('_token');

        // 在数据库中查询数据
        $data = DB::table('shop_user')->where('email', $res['email'])->first();
        // dd($data);die;
        if (!$data) {
            return back()->with('error','邮箱或者密码错误');
        }
        // 如果有 将查询到的密码进行解密
        $decrypted = decrypt($data->password);
        if ($res['password'] != $decrypted) {

            return back()->with('error','邮箱或者密码错误');
        }
        // dd($data);
        $uid = $data -> id;
        // dd($uid);
        // 存session user ia
        session(['user'=>$uid]);
        // 根据id查出用户的购物车信息 订单信息 收藏信息 收货地址信息


        return redirect('/');
    }



    /**
     * Display a listing of the resource
     *
     * @return
     */
    public function dologout(Request $request)
    {
        // $request->session()->flush();
        session::flush();

        return redirect('/home/login')->with('success','退出成功');
    }
}
