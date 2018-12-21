<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Poster;
use DB;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = Poster::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $postername = $request->input('postername');

                if(!empty($postername)) {
                    $query->where('postername','like','%'.$postername.'%');
                }
            })
            // pageinate  分页  每页显示多少条数
        ->paginate(5);

            //dd($request);

        return view('admin.poster.index',[
            'title'=>'广告管理',
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
        //添加广告
       return view('admin.poster.add',[
            'title'=>'广告添加页面'
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
        $this->validate($request, [
            'postername' => 'required',
            'title'=>'required',
            'bgcolor'=>'required',
            'url'=>'required',
            'pic'=>'required'
        ],[
            'postername.required' => '商家名不能为空',
            'title.required'=>'标题不能为空',
            'bgcolor.required'=>'背景色不能为空',
            'url.required'=>'链接地址址不能为空',
            'pic.required'=>'图片不能为空'
        ]);

        $res = $request->except('_token','pic');

        //dd($res);

        if($request->hasFile('pic')){
                //自定义名字
                $name = rand(111,999).time();

                //获取后缀
                $suffix = $request->file('pic')->getClientOriginalExtension();

                $request->file('pic')->move('./uploads',$name.'.'.$suffix);

                $res['pic'] = '/uploads/'.$name.'.'.$suffix;

                //dd($res);
        }

            try{

                $data = Poster::create($res);

                //dd($res);

                if($data){
                    return redirect('/admin/poster')->with('success','添加成功');
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
        $res = Poster::find($id);

        //dd($res);

        // $rs = session(['uid'=>$id]);

        return view('admin.poster.edit',[
            'title'=>'广告修改页面',
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

        if($a = $request->hasFile('pics')){


            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('pics')->getClientOriginalExtension();

            $request->file('pics')->move('./uploads',$name.'.'.$suffix);

            $res['pics'] = '/uploads/'.$name.'.'.$suffix;

        }

        try{

            $data = Poster::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/poster')->with('success','修改成功');
            } else {
                return redirect('/admin/poster')->with('success','修改成功');

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

            $res = Poster::destroy($id);

            if($res){
                return redirect('/admin/poster')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
