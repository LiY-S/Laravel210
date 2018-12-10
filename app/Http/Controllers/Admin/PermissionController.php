<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res =  Permission::where('url_name','like','%'.$request->url_name.'%')->paginate($request->input('num',10));


        return view('admin.permission.index',[
            'title'=>'权限的列表页面',
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
        return view('admin.permission.create',['title'=>'权限添加页面']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rs = $request->only('url_name','url');
        // dump($rs);die;
         // $data = Permission::create($rs);
         // dump($date);die;
         // if (empty($rs)) {
             // return back()->with('error','添加失败');
         // }
            try{

                $data = Permission::create($rs);
                
                if($data){
                    return redirect('/admin/permission')->with('success','添加成功');
                  
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
         $res = Permission::where('id',$id)->first();
        // dump($res);die;

        return view('admin.permission.edit',['title'=>'权限的添加页面','res'=>$res]);
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
        $res = $request->only('url_name','url');
        // dump($res);die;
         try{

            $data = Permission::where('id',$id)->update($res);
            
            if($data){
                return redirect('/admin/permission')->with('success','修改成功');
            }else{
                return redirect('/admin/permission')->with('success','修改成功');
                
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

            $data = Permission::destroy($id);
            
            if($data){
                return redirect('/admin/permission')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }


    /**
     * 用户没有权限访问页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remind()
    {
        return view('errors.remind',['title'=>'用户没有权限访问页面']);
    }
}

