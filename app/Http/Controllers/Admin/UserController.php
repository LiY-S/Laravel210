<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Hash;
use App\Model\Admin\User;
use DB;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = User::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }
            })
            ->paginate($request->input());

            //dd($request);



        return view('admin.user.index',[
            'title'=>'用户列表',
            'res'=>$res,
            'request'=>$request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.add',['title'=>'添加管理员']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $this->validate($request, [
            'username' => 'required|regex:/^\w{6,16}$/',
            'profile'=>'required'
        ],[
            'username.required' => '用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'profile.required'=>'请上传图片'
        ]);

        $res = $request->except('_token','profile','repass');

        if($request->hasFile('profile')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        //网数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);

        try{

            $data = User::create($res);

            if($data){
                return redirect('/admin/user')->with('success','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
        }

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
        $res = User::find($id);

        return view('admin.user.edit',[
            'title'=>'用户的修改页面',
            'res'=>$res
        ]);
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
        $res = $request->except('_token','_method');

        if($request->hasFile('profile')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        try{

            $data = User::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/user')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{

            $res = User::destroy($id);

            if($res){
                return redirect('/admin/user')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }

    public function ajaxupdate(Request $request)
    {
        //判断空

        //判断用户名是否一样

        //判断位数 6~12

        $res = [];

        $id = $request->ids;

        $res['username'] = $request->uv;

        //修改数据
        $data = User::where('id',$id)->update($res);

        if($data){

            echo 1;

        } else {

            echo 0;
        }


    }
}
