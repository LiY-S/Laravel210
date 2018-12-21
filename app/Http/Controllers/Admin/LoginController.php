<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\PhraseBuilder;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Hash;
use DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	return view('admin.login.login',['title'=>'后台的登录页面']);
    }

    public function dologin(Request $request)
    {
    	//表单验证
        // $rs = $request->all();
        // dd($rs);
    	//判断用户名
    	$rs = DB::table('shop_admin')->where('username',$request->username)->first();

    	if(!$rs){

    		return back()->with('error','用户名或者密码错误');
    	}
    	//判断密码
    	//hash

    	if (!Hash::check($request->password, $rs->password)) {

		    return back()->with('error','用户名或者密码错误');
		}

		//判断验证码
		$code = session('code');
        // echo $code;die;
        // echo $request->code;die;
		if($code != $request->code){
            // dd( $request->code);die;
            session()->flash('username', $request->username);
            session()->flash('password', $request->password);
		    return back()->with('error','验证码错误');
		}

		//存点信息  session
		session(['uid'=>$rs->id]);
		session(['uname'=>$rs->username]);

		return redirect('/admin');

    }
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 130, $height = 47, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();

    }
     public function profile()
    {
        $id=session('uid');
        $res = DB::table('shop_admin')->where('id',$id)->first();
        // dump($res);die;
        return view('admin.login.profile',['title'=>'修改头像','res'=>$res]);

    }

     public function upload(Request $request)
    {
        //获取上传的文件对象
        $file = $request->file('profile');
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads/login/',$newName);

            $filepath = '/uploads/login/'.$newName;

            $res['profile'] = $filepath;
            DB::table('shop_admin')->where('id',session('uid'))->update($res);
            //返回文件的路径
            return  $filepath;
        }
    }
    //修改密码
    public function passchange(Request $request)
    {

        return view('admin.login.passchange',['title'=>'修改密码']);

    }
    public function pass(Request $request)
    {
        $res = DB::table('shop_admin')->where('id',session('uid'))->first();

            // dump($request->passwords);
            // dump($request->passwordss);die;


        if (!empty($request->password) && !empty($request->passwords) && !empty($request->passwordss)) {


            if(!Hash::check($request->password, $res->password)){

                return back()->with('error','修改失败,原密码错误');

            }elseif($request->passwords !== $request->passwordss){

                return back()->with('error','修改失败,两次密码输入不一致');
            }

                $a= [];
                $a['password']=Hash::make($request->passwords);
                // dump($a);die;
            DB::table('shop_admin')->where('password',$res->password)->update($a);

               //return back()->with('success','修改成功');
            // if(Hash::check($request->passwords, $res->password)){

                return redirect('/admin/login')->with('success','修改成功请重新登陆');
            // }
        }


           return back()->with('error','修改失败,密码不得为空');

    }
    //退出
    public function logout()
    {
        //清空session
        session(['uid'=>'']);

        return redirect('/admin/login');
    }
    public function index(Request $request){


    }
}
