<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use DB;
use Session;
use App\Library\lib\Ucpaas;
use App\Model\Admin\Users;

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
     * 忘记密码
     *
     * @return
     */
    public function forget()
    {
        return view('home.login.forget',[
            'title' => '忘记密码',

        ]);
    }

    /**
     * 处理通过ajax传过来的值并进行对比
     *
     * @return
     */
    public function wjmmphone(Request $request)
    {
        // 获取传过来的值
        $phone = $request ->phone;
        $data = DB::table('shop_user')->where('phone',$phone)->first();
        if ($data) {
            echo 1;
        } else {
            echo 0;
        }

        // echo $phone;
    }


    /**
     * Display a listing of the resource
     *
     * @return
     */
    public function wjmmajax(Request $request)
    {
        // 通过用户id查询出电话
        $number = $request->phone;
        //验证码
        $code = rand(111111,999999);
       //初始化必填
        //填写在开发者控制台首页上的Account Sid
        $options['accountsid']='623d1640b642f2d78893b3f5790da4c4';
        //填写在开发者控制台首页上的Auth Token
        $options['token']='7fbf8f5d5011b1cb732f5d17f8f870cc';

        //初始化 $options必填
        $ucpass = new Ucpaas($options);
        $appid = "4b5152dedc5b427f85194997773c09b4";    //应用的ID，可在开发者控制台内的短信产品下查看
        $templateid = "405579";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
        $uid = "";
        // 将验证码的值存到session
        session::put('code',$code);
        //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

        echo $ucpass->SendSms($appid,$templateid,$code,$number,$uid);
    }


    /**
     * Display a listing of the resource
     *
     * @return
     */
    public function wjmmcheck(Request $request)
    {
        $data = session::get('code');
        $da = $request -> code;
        if ($data == $da) {
            return 1;
        } else {
            return 0;
        }
    }


    /**
     * Display a listing of the resource
     *
     * @return
     */
    public function dowjmm(Request $request)
    {
        // echo 1;
        $data = $request ->only('phone');
        // dd($data);
        $res = DB::table('shop_user')->where('phone',$data)->first();
        // dd($email);
        return view('home.login.yanzheng',[
            'title'=> '    ',
            'res' => $res
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @return
     */
    public function xiugmm(Request $request, $id)
    {
        $data = $request -> only('password');
        // 将密码加密
        $data['password'] = encrypt($data['password']);

        // dd($data);
        try{

            $res =Users::where('id',$id) -> update($data);
            session(['user'=>$id]);

            if($res){
                return redirect('/')->with('success','修改成功');
            }else{
                return redirect('/')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
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
