<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinksRequest;
use App\Model\Admin\Links;
use DB;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = Links::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $title = $request->input('title');

                //如果用户名不为空
                if(!empty($title)) {
                    $query->where('title','like','%'.$title.'%');
                }

            })
            // pageinate  分页  每页显示多少条数
        ->paginate(10);

            //dd($request);

        return view('admin.links.index',[
            'title'=>'友情链接列表',
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
        return view('admin.links.add',[
            'title'=>'添加友情链接'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinksRequest $request)
    {
        //

        $res = $request->except('_token');

        if($request->hasFile('logo')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();

            $request->file('logo')->move('./uploads',$name.'.'.$suffix);

            $res['logo'] = '/uploads/'.$name.'.'.$suffix;

        }

        try{

            $data = Links::create($res);

            if($data){
                return redirect('/admin/links')->with('success','添加成功');
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
        $res = Links::find($id);

        return view('admin.links.edit',[
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

        if($request->hasFile('logo')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();

            $request->file('logo')->move('./uploads', $name.'.'.$suffix);

            $res['logo'] = '/uploads/'.$name.'.'.$suffix;

        }

        try{

            $data = Links::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/links')->with('success','修改成功');
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

            $res = Links::destroy($id);

            if($res){
                return redirect('/admin/links')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
