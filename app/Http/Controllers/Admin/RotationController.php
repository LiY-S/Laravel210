<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Rotation;

use DB;

class RotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res =  Rotation::where('ad_name','like','%'.$request->ad_name.'%')->paginate($request->input('num',5));

          // dd($res);
        return view('admin.rotation.index',[
            'title'=>'轮播图列表页面',
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
        return view('admin.rotation.create',['title'=>'轮播图添加页面']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rs = $request->only('ad_name','ad_src','ad_sort','ad_a');
            // dump($rs);die;
            // $data = Role::create($rs);
            // dump($data);die;
        if($request->hasFile('ad_src')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('ad_src')->getClientOriginalExtension();

            $request->file('ad_src')->move('./uploads/rotation',$name.'.'.$suffix);

            $rs['ad_src'] = '/uploads/rotation/'.$name.'.'.$suffix;

        }
            // dump($rs);die;


            try{

                $data = Rotation::create($rs);
                // dd($data);die;
                
                if($data){
                    return redirect('/admin/rotation')->with('success','添加成功');
                  
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
        $res = Rotation::where('id',$id)->first();
        // dump($res);die;
        return view('admin.rotation.edit',['title'=>'轮播图的修改页面','res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $res = $request->only('ad_name','ad_sort','ad_a');
          
            // $re = $request->only('ad_name');
            // dd($re);
            // DB::table('shop_ad')->where('id',$id)->update($rs);$rs['ad_src']
            //返回文件的路径
            // return  $rs['ad_src'];
        // }
        // $file = $request->file('ad_src');
        // dump($file);die;
        //判断文件是否有效
        // if($file->isValid()){
        //     //上传文件的后缀名
        //     $entension = $file->getClientOriginalExtension();
        //     //修改名字
        //     $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
        //     //移动文件
        //     $path = $file->move('./uploads/rotation/',$newName);

        //     $filepath = '/uploads/rotation/'.$newName;

            // $res['ad_src'] = $filepath;
            // DB::table('shop_ad')->where('id',$id)->update($res);
            //返回文件的路径
            // return  $filepath;
        // }

         try{

            $data = Rotation::where('id',$id)->update($res);
            // dd($data);
            if($data){
                return redirect('/admin/rotation')->with('success','修改成功');
            }else{
                return redirect('/admin/rotation')->with('success','修改成功');
                
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
        try{

            $data = Rotation::destroy($id);
            
            if($data){
                return redirect('/admin/rotation')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }

    /* Remove the specified resource from storage.
     *
     */
    public function ajax(Request $request,$id)
    {

        // echo 1;die;
       
        $res = $request->all();
        
        // dump($res);die;
        // if($res->isValid()){
        // //自定义名字
          foreach ($res as $v) {
                $name = rand(111,999).time();

                //获取后缀
                $suffix = $v[0]->getClientOriginalExtension();

                $v[0]->move('./uploads/rotation',$name.'.'.$suffix);

                $fileName = '/uploads/rotation/'.$name.'.'.$suffix;
                // dd($fileName);
                $arr['ad_src'] = $fileName;
                // dd($arr);
                DB::table('shop_ad')->where('id',$id)->update($arr);
                return $fileName;
            }
             
        // }
    }
}
