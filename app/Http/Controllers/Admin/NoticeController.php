<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $numm = $request->input('num',5);
        $res =  DB::table('shop_notice')->where('title','like','%'.$request->title.'%')->paginate($request->input('num',5));
        return view('admin.notice.index',[
            'title'=>'公告管理',
            'res' => $res,
            'request' => $request,
            'numm' => $numm
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
        return view('admin.notice.add',[
            'title' => '公告添加页面'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request -> except('_token');
        // dd($data);
        // 将传过来的值存入到数据库中
        $res = DB::table('shop_notice')->insert($data);
        if ($res) {
            return redirect('/admin/notice') -> with('success','添加成功');
        } else {
            return back() -> whith('error','添加失败，请在标题、写入板内输入内容');
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
        // 查询数据库中的值
        $data = Notice::where('id',$id) -> first();
        // dd($data);
        return view('admin.notice.edit',[
            'title' => '公告修改',
            'data' => $data
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
        $data = $request -> except('_token','_method');
        // dd($data);

        try{

             $res = Notice::where('id',$id) -> update($data);

            if($res){
                return redirect('/admin/notice')->with('success','修改成功');
            }else{
                return redirect('/admin/notice')->with('success','修改成功');
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

            $data = Notice::destroy($id);

            if($data){
                return redirect('/admin/notice')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
