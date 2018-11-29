<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Cate;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = Cate::select(DB::raw('*,CONCAT(path,id) as paths'))->where('cate_name','like','%'.$request->catname.'%')->
        orderBy('paths')->
        paginate($request->input('num',10));
        // dd($res);
        foreach($res as $v){

            //path
            $ps = substr_count($v->path,',')-1;

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;

        }
        // dump($res);
        return view('admin.category.index',[
            'title'=>'分类列表',
            'request'=>$request,
            'res'=>$res
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
        $res = Cate::select(DB::raw('*,CONCAT(path,id) as paths'))->orderBy('paths')->get();
        foreach ($res as $k => $v) {
            $ps = substr_count($v->path,',')-1;
            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;
        }
        return view('admin.category.add',[
            'title'=>'分类添加页面',
            'res'=>$res
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
        $res = $request->except('_token');
        if($request->pid == '0'){

            $res['path'] = '0,';

        } else {
            //查询数据
            $rs = Cate::where('id',$request->pid)->first();
            // path.id       0, 1,
            $res['path'] = $rs->path.$rs->id.',';

        }
        // $data = Cate::create($res);
        // dd($data);

        /* */


        //往数据表里面进行添加
        try{

            $data = Cate::create($res);
            if($data){
                return redirect('/admins/cate')->with('success','添加成功');
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
        $cat = Cate::select(DB::raw('*,CONCAT(path,id) as paths'))->orderBy('paths')->get();
        foreach ($cat as $k => $v) {
            $ps = substr_count($v->path,',')-1;
            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;
        }
        $res = Cate::find($id);
        return view('admin.category.edit',[
            'title'=>'分类修改页面',
            'cat'=>$cat,
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
        $res = $request->only('status','cate_name');

        try{

            $data = Cate::where('id',$id)->update($res);
            if($data){
                return redirect('/admins/cate')->with('success','修改成功');
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

            $data = DB::table('shop_category')->delete($id);;
            if($data){
                return redirect('/admins/cate')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
