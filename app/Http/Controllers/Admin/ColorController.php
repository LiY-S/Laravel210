<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Color;
use DB;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $goods = Goods::where('id',$id)->first();
        $colors = Color::where('goods_id',$id)->orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $color = $request->input('color');
                //如果商品名不为空
                if(!empty($color)) {
                    $query->where('color','like','%'.$color.'%');
                }
            })
        ->paginate($request->input('num', 10));
        foreach ($colors as $v) {
            // dd($v);
            $v->photo = explode(',', $v->photo);
        }
        // dd($colors);
        return view('admin.color.index',[
            'title'=>'商品颜色列表',
            'goods'=>$goods,
            'colors'=>$colors,
            'request'=>$request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $goods = Goods::where('id',$id)->get();
        // dd($goods);
        return view('admin.color.add',[
            'title'=>'颜色添加页面',
            'goods'=>$goods
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $color = $request -> except('_token','photo','photos');
        $photos = $request->input('photos');
        $color['goods_id'] = $id;
        $color['photo'] = implode(',',$photos);
        try{

            $data = Color::create($color);
            if($data){
                return redirect('/admins/colors/'.$id)->with('success','添加成功');
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
        $color = Color::where('id',$id)->first();
        $goods = Goods::where('id',$color->goods_id)->get();
        $color->photo = explode(',',$color->photo);
        return view('admin.color.edit',[
            'title'=>'颜色修改页面',
            'color'=>$color,
            'goods'=>$goods
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
        // dd($id);
        $goods_id = Color::where('id',$id)->first()->goods_id;
        // dd($goods_id);
        $color = $request -> except('_token','photo','photos');
        $photos = $request->input('photos');
        $color['goods_id'] = $goods_id;
        // dd($photos);
        if($photos){
            $color['photo'] = implode(',',$photos);
        }

        // dd($color);
        try{

            $data = Color::where('id',$id)->update($color);
            // dump($data);
            if($data){
                return redirect('/admins/colors/'.$goods_id)->with('success','修改成功');
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
        // dd($id);
        $colors = Color::where('id',$id)->first();
        $goods = Goods::where('id',$colors->goods_id)->first();
        try{
            // dd($id);
            $data = DB::table('shop_goods_color')->delete($id);
            if($data){
                return redirect('/admins/colors/'.$goods->id)->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }

    /**
     *  上传商品图片
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
