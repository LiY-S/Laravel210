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

      //   	if (!Hash::check($request->password, $rs->password)) {
    		    
    		//     return back()->with('error','用户名或者密码错误');
    		// }
        
		//加密解密
		// if($request->password != decrypt($rs->password)){

		//     return back()->with('error','用户名或者密码错误');
			
		// }n /;n

		//判断验证码
		$code = session('code');
        // echo $code;die;
        // echo $request->code;die;
		if($code != $request->code){
            // dd( $request->code);die;
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
        return view('admin.login.profile',['title'=>'修改头像']);
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
            $path = $file->move('./uploads',$newName);

            $filepath = '/uploads/'.$newName;

            $res['profile'] = $filepath;
            DB::table('user')->where('id',session('uid'))->update($res);
            //返回文件的路径
            return  $filepath;
        }
    }
    //修改密码
    public function passchange()
    {
        return view('admin.login.passchange',['title'=>'修改密码']);
    }
    //退出
    public function logout()
    {
        //清空session
        session(['uid'=>'']);

        return redirect('/admin/login');
    }
}
