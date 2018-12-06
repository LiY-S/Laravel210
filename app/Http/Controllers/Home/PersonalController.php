<?php


namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Library\lib\Ucpaas;
use Session;


class PersonalController extends Controller
{
    //
    public function personal()
    {

        $uid = session('user');
        $user = DB::table('shop_user')->where('id',$uid) ->first();
        // dd($user);

        return view('home.personal.personal',[
            'title' => '个人中心',
            'user' => $user
        ]);
    }

    public function upload(Request $request)
    {
        //获取上传的文件对象
        $file = $request->file('profile');
        // echo $file;die;
        //判断文件是否有效

        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            // $path = $file->move('./uploads/',$newName);
            $filepath = public_path('/uploads/').$newName;;
            $image = Image::make($file)->resize(150,150, function ($constraint) {$constraint->aspectRatio();})->save($filepath);
            // 定义相对路径
            $path = '/uploads/'.$newName;
            $res  = [];
            $res['profile'] = $path;
            DB::table('shop_user')->where('id',session('user'))->update($res);
            //返回文件的路径
            return  $path;
        }
    }
    /**
     * Display a listing of the resource
     *
     * @return
     */

    public function formupload(Request $request)
    {
        $id = $request -> id;
        $data = $request -> except('_token','profile');
        // 判断修改的值与数据库中的值是否一致

        // 查询数据库中的值 通过id
        $user = DB::table('shop_user')->where('id',$id) ->first();
        $user_name = $user->username;
        $user_email = $user->email;
        $user_phone = $user->phone;
        if ($data['username'] == $user_name && $data['phone'] == $user_phone) {
            return redirect('/');
        }

        $res = DB::table('shop_user')->where('id',$id) -> update($data);
        // dd($res);
        if ($res) {
            return redirect('/');
        }
    }

    public function mima(Request $request)
    {
        $id = $request -> id;
        // dd($id);
        return view('home.personal.mima',[
            'title' => '修改密码',
            'uid' => $id
        ]);
    }


    public function checkphone(Request $request)
    {
        // 通过用户id查询出电话
        $uid = session('user');
        $res = DB::table('shop_user') -> where('id',$uid) -> first();
        $number = $res->phone;
        // $number = 17713148904;
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

    public function update(Request $request)
    {
        $id = $request -> id;
        // dd(1111);
        // 进行验证码对比,成功存入数据库  失败返回修改密码页面
        $data  = $request ->except('_token','repass');
        // dd($data);
        $code = $data['code'];
        // dd($code);
        $codes = session::get('code');
        // dd($codes);
        // if ($code != $codes) {
        //     return back() -> with('error','验证码不正确!!!');
        // }
        // 将密码加密
        $dat = encrypt($data['password']);
        $res = [];
        $res['password'] = $dat;
        // dd($res);
        // 存入数据库
        $res = DB::table('shop_user')->where('id',$id) -> update($res);
        if ($res) {
            // 清空session 中的值   重新登录
            session::flush();
            return redirect('/home/login')->with('success','修改成功');
        }
    }
    public function shgl(Request $request)
    {
        $uid = session('user');
        // 通过用户id 将收货地址表中的数据显示出来
        $data = DB::table('shop_address') -> where('user_id', $uid) -> get();
        // dd($data);
        return view('home.personal.shgl',[
            'title' => '收货地址管理',
            'uid' => $uid,
            'data' => $data
        ]);
    }
    public function shglxz(Request $request)
    {
        $uid = session('user');
        // 通过用户id查询数据库中的信息
        $res = DB::table('shop_address')->where('user_id',$uid)->get();
        $data = count($res);
        // dd($data);
        if ($data <= 5) {
            echo 1;
        } else {
            echo 0;
        }


        // dd($res);
    }
    public function add()
    {
        return view('home.personal.add',[
            'title' => '添加收货地址'
        ]);
    }

    public function tianjia(Request $request)
    {
        // 设置user_id
        $uid = session('user');
        // dd($uid);
        $data = $request -> except('_token');
        $data['user_id'] = $uid;
        // dd($data);
        // 将数据存入到数据库中
        $res = DB::table('shop_address')-> insert($data);
        if ($res) {
            return redirect('/home/shgl') -> with('success','添加收货地址成功');
        }

        // 拼接地区
        // $province = $data['province'];
        // $city = $data['city'];
        // $county = $data['county'];
        // $diqu = $province.'/'.$city.'/'.$county;
        // dd($diqu);

    }
    public function remov(Request $request)
    {
        $aid = $request -> aid;
        // dd($aid);
        // 通过aid 删除数据库中的值
        $res = DB::table('shop_address')->where('id',$aid) -> delete();
        if ($res) {
            echo 1;
        } else {
            echo 0;
        }

    }

}
