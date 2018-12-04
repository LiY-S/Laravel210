<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $res =  Role::where('role_name','like','%'.$request->role_name.'%')->paginate($request->input('num',10));


        return view('admin.role.index',[
            'title'=>'角色的列表页面',
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
        return view('admin.role.create',['title'=>'角色添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
       if (!empty($rs)) {

            $rs = $request->only('role_name');

            // $data = Role::create($rs);
            // dump($data);die;

            try{

                $data = Role::create($rs);
                
                if($data){
                    return redirect('/admin/role')->with('success','添加成功');
                  
                }

            }catch(\Exception $e){


                return back()->with('error','添加失败');
            }
        }
       return back()->with('error','添加失败');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Role::where('id',$id)->first();
        // dump($res);die;

        return view('admin.role.edit',['title'=>'角色的添加页面','res'=>$res]);
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
        $res = $request->only('role_name');

         try{

            $data = Role::where('id',$id)->update($res);
            
            if($data){
                return redirect('/admin/role')->with('success','修改成功');
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

            $data = Role::destroy($id);
            
            if($data){
                return redirect('/admin/role')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}

