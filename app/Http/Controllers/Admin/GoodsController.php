<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Cate::select(DB::raw('*,CONCAT(path,id) as paths'))->orderBy('paths')->get();
        foreach ($cate as $k => $v) {
            $ps = substr_count($v->path,',')-1;
            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;
        }
        return view('admin.goods.add',[
            'title'=>'商品添加页面',
            'cate'=>$cate
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

        $res = $request -> except('_token','photo','color','photos');
        $res['size'] = implode(',', $res['size']);
        // dump($res);
        $data = Goods::create($res);
        $file = $request->file('photo');
        if (count($file) > 3 || count($file) < 3) {
            return back()->with('error','请上传三张展示图');
        }
        $color = $request->input('color');
        /*dump($res);
        dump($data);
        dump($file);
        dump($color);*/
        $photo = $request->input('photos');
        // dump($photo);
        $arr = [];
        $arr['goods_id'] = $data->id;
        $arr['color'] = $color;
        $arr['photo'] = implode(',',$photo);
        try{

            $data = Color::create($arr);
            if($data){
                return redirect('/admins/goods')->with('success','添加成功');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('shop_goods_color')->where('goods_id',$id)->delete();
        try{

            $data = DB::table('shop_goods')->delete($id);
            if($data){
                return redirect('/admins/goods')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }


    /**
     *  修改头像方法
     *
     *  @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        // echo 1;
        //获取上传的文件对象
        $file = $request->file();
        /*if (count($file) != 3) {
            return undefined;
        }*/
        // dd($file);
        $arr = [];
        foreach ($file['fileupload'] as $v) {
            //判断文件是否有效
                //上传文件的后缀名
                $entension = $v->getClientOriginalExtension();
                //修改名字
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
                //移动文件
                $path = $v->move('./uploads/photo/'.date('Y-m-d'),$newName);

                $filepath = '/uploads/photo/'.date('Y-m-d').'/'.$newName;
                $arr[] = $filepath;
                // $res['profile'] = $filepath;
                // DB::table('user')->where('id',$id)->update($res);
                //返回文件的路径
                // return $filepath;
                // echo 1;
        }
        return $arr;
    }
}
