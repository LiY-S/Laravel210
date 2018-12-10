<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Confcontroller extends Controller
{
    /**
     * 显示网站配置表单
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = DB::table('shop_conf')->find(1);
        return view('admin.conf.index',[
            'title'=>'网站配置',
            'res'=>$res
        ]);
    }


    /**
     * 保存网站配置信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // echo 1;
        $res = $request->except('_token','_method','values');
        // if ($res) {
        //     return redirect('/admins/conf');
        // }
        try{
            // echo 1;
            $data = DB::table('shop_conf')->where('id',1)->update($res);
            // dump($data);
            if($data == 0){
                return  redirect('/admins/conf')->with('success','配置成功');
            }
            if($data){
                return redirect('/admins/conf')->with('success','配置成功');
                // return redirect('/admins/conf');
            }

        }catch(\Exception $e){
            return  redirect('/admins/conf')->with('error','配置失败');
            // return back();
        }
        // dd($res);
    }



    public function uploads(Request $request)
    {
    	// echo 1;
        //获取上传的文件对象
        $file = $request->file();
        // return $file;
        // dd($file);
        foreach ($file as $v) {
        	//上传文件的后缀名
            $entension = $v[0]->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $v[0]->move('./uploads/logo',$newName);

            $filepath = '/uploads/logo/'.$newName;

            $res['values'] = $filepath;
            DB::table('shop_conf')->where('id',1)->update($res);
            //返回文件的路径
            return $filepath;
        }
    }
}
