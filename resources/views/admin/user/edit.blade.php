@extends('mutual.admins')

@section('title',$title)

@section('content')

 <style>

.col-center-block {
    float: none;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

</style>


<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span></span>
        </div>
        <div class="mws-panel-body no-padding">

            @if (count($errors) > 0)
            <div class="mws-form-message error">
                显示错误信息
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style='font-size:14px'>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="/admin/user/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>

            <div class="col-md-6 col-center-block">
                    <div class="content-box">
                        <div class="head info-bg clearfix">
                            <h5 class="content-title pull-left">
                                {{$title}}
                            </h5>

                        </div>
                        <div class="content">
                            <div class="form-group">
                                <label class="control-label info-color">
                                    用户名
                                </label>
                                <input type="text" class="form-control input-info" name="username" value="{{$res->username}}">
                            </div>

                            <form id='art_form' action="/admin/user/upload" method="post" class="mws-form" enctype='multipart/form-data'>

                            <div class="head clearfix font-fa:12px  info-color" style="font-size:17px">
                                    请选择图像
                                </div>
                            <div class="content-box">

                                   @php
                                       $user = DB::table('shop_admin')->where('id',session('uid'))->first();
                                   @endphp
                                <div class="content border:1px">
                                    <img src="{{$user->profile}}" id='imgs' alt="上传后显示图片">
                                    <input id='file_upload' type="file" name="profile" style="" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    状态
                                </label>
                                    <ul class="info-color inline" style="list-style:none;">
                                        <li style="display: inline; float:left;margin-right:20px"><label><input type="radio" name='status' value="1"  @if($res->status== 1) checked @endif>开启</label></li>
                                        <li><label><input type="radio" name='status' value="0" style='display:inline' @if($res->status== 0) checked @endif>禁用</label></li>
                                    </ul>
                            </div>

                            <div class="mws-button-row">
                                {{csrf_field()}}

                                {{method_field('PUT')}}
                                 <button type="submit" class="btn btn-info">修改</button>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop


 @section('js')
<script type="text/javascript">

    $(function(){
        $("#file_upload").change(function(){

            var imgPath = $("#file_upload").val();

            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }

            var formData = new FormData($('#art_form')[0]);
             //console.log(formData);
            $.ajax({
                type: "POST",
                url: "/admin/user/upload",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    //alert(data);
                    $('#imgs').attr('src',data);
                     //$('#art_thumb').val(data);

                    // setTimeout(function(){
                    // location.href = '/admin/user';
                    // },1000)

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
    })

    $('.mws-form-message').delay(2000).fadeOut(2000);
</script>

@stop
