<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;
use Config;

class RegistController extends Controller
{
    //
    public function index()
    {
        return view('home.register.regist', [
            'title' => '淘鞋吧注册'
        ]);
    }
    public function doregist(Request $request)
    {
<<<<<<< HEAD
        // $data = $request ->all();
        // dd($data);
=======
        $data = $request ->except('_token','checkbox','repass');
        // 生成随机字符串
        $username = 'xinyonghu'.mt_rand(11111,99999);
        $data['username'] = $username;
        // 定义默认头像
        $profile = '/uploads/2111542615753.png';
        $data['profile'] = $profile;
        // 设置默认状态
        $data['status'] = 1;
        // 生成注册时间
        $time = time();
        $data['register_time'] = $time;
        // dd($data);
        // 获取注册ip
        $ip = $_SERVER['REMOTE_ADDR'];
        $data['last_ip'] = $ip;
        // 获取用户密码 将用户密码进行加密解密
        $data['password'] = encrypt($request->password);
        // 解密
        // $decrypted = decrypt($data['password']);
        $data['token'] = str_random(40);
        // dd($data);die;
        // 添加到数据库
        $res = DB::table('shop_user')->insertGetId($data);
        if($res){
            //发送邮件
            // return view('','title[])
            Mail::send('home.register.remind', ['id'=>$res,'token'=>$data['token'],'email'=>$data['email']], function ($m) use($data) {

                $m->from('97693650@qq.com', '淘鞋吧');

                $m->to($data['email'],$data['username'])->subject('淘鞋吧');
            });

            //提示信息

            return view('home.register.tixing',['title'=>'新注册用户提醒邮件']);
        }
    }
    public function tixing(Request $request)
    {
        //获取信息
        // echo '1111111';die;
        //把status 0 => 1
        $id = $request->id;

        $rs = DB::table('shop_user')->where('id',$id)->first();

        $token = $request->token;

        if($rs->token == $token){

            $res['status'] = '1';

            $data = DB::table('shop_user')->where('id',$id)->update($res);
            // echo $data;
            if($data){

                return view('home.register.regist',['title'=>'用户注册']);
            }
        }




>>>>>>> 0234b912bf7b1854263e81c8d6a830f0c824fadb
    }
}
