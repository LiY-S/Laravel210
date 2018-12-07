@extends('mutual.admins')

@section('title',$title)

@section('content')




<div class="col-md-6 col-md-offset-3" style="float: none;height: 100%">
    <div class="mws-panel-body no-padding">
        @if (session('error'))
        <div class="mws-form-message error">
            <ul>
                <li class="error"style="background-color: #ef9a9a;list-style:none;font-size: 20px">{{session('error')}}</li>
            </ul>
        </div>
        @endif
        <form id='art_form' action="/admin/rotation/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
            <div class="content-box">
                <div class="head info-bg clearfix">
                    <h5 class="content-title pull-left">
                        {{$title}}
                    </h5>
                    <div class="functions-btns pull-right">
                    </div>
                </div>
                <div class="content">
                    <div class="form-group">
                        轮播图名称
                        <hr>
                        <input type="text" class="form-control" name='ad_name' value="{{$res->ad_name}}">
                        <input type="hidden" id="yc" name="yc" value="{{$res->id}}">
                    </div>
                    <div class="form-group">
                        排序
                        <hr>
                        <input type="text" class="form-control" name='ad_sort'value="{{$res->ad_sort}}">
                    </div>
                    <div class="form-group">
                        图片地址
                        <hr>
                        <input type="text" class="form-control" name='ad_a' value="{{$res->ad_a}}">
                    </div>
                    <center>
                        <img src="{{$res->ad_src}}" id='imgs' alt="上传后显示图片" style="width:300px;height: 300px ">
                    </center>
                   <!--  <div class="mws-form-row">
                        轮播图图片
                        <hr>
                        <label class="mws-form-label">头像</label>
                        
                        <div class="mws-form-item">

                            <img src="{{$res->ad_src}}" id='imgs' alt="上传后显示图片" >

                            <div style="position: relative;" class="fileinput-holder">
                                <input id="file_updata" type="file" name='ad_src' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 99px; opacity: 0; z-index: 999;margin-top: -100;">
                            </div>
                        </div>
                    </div> -->
                    <div class="content">
                        轮播图图片
                        <hr>
                        <input id="file_upload" type="file" class="dropify" name='ad_src'>
                    </div>
                   
                </div>
            </div>
             {{csrf_field()}}
             {{method_field('PUT')}}
            <button type="submit" class="btn btn-info">修改</button>
        </form>
    </div>
</div>


@stop

@section('js')
<script>

        $('.error').delay(2000).slideUp(2000);
</script>

<script>
    
    $(function () {
        $("#file_upload").change(function () {
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

            var formData = new FormData();
            var files = $('#file_upload')[0].files;
            // console.log(files);
            for (var i = 0; i < files.length; i++) {
                formData.append('fileupload[]',files[0]);
            }
            console.log(formData);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
             $.ajax({
                type: "POST",
                url: "/admin/ajax/{{$res->id}}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#imgs').attr('src',data);
                    // console.log(data);
                },
                error:function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
    })

</script>
@stop