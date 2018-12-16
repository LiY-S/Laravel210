@extends('mutual.admins')

@section('title',$title)

@section('content')
  <script src="/admins/admins/bower_components/jquery/dist/jquery.min.js"></script>

@if (session('error'))
            <div class="alert alert-danger alert-dismissible fade in" role="alert" id="divs">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('error')}}</strong>
            </div>
        @endif
<style>
	.col-md-6{
        	margin-left: 400px;
        }
</style>
<div class="col-md-6" style="float: none">
    <div class="content-box">
        <div class="head warning-bg clearfix">
            <h5 class="content-title pull-left">
                商品添加
            </h5>
        </div>
        <div class="content">
                    	@foreach ($goods as $v)
            <form class="form-horizontal" action="/admins/colors/save/{{$v->id}}" method="post"  enctype='multipart/form-data' name="upfile"  id="art_form">
                        @endforeach
                <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">
                        商品名称
                    </label>
                    <div class="col-sm-10">
                    	@foreach ($goods as $v)
                        <input type="text" class="form-control" id="inputPassword3" name="" value="{{$v->goods_name}}" disabled="disabled">
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                        商品颜色
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="color">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        对应图片
                    </label>
                    <div class="col-sm-10">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="file" name="photo[]" multiple style="margin-top: 10px" id="file_upload">
                    </div>
                </div>
                <div class="form-group" style="margin-top:30px">
                    <div class="">
                		{{csrf_field()}}
                        <input id="sub" type="submit" class="btn-info col-sm-3 col-sm-offset-5" style="border: 0px;border-radius:5px;height: 50px" value="添加">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>



<script>

    // alert($);
    $(function () {
        $("#file_upload").change(function () {
            var files = this.files;
            if (files && files.length != 3) {
                alert('请上传三张展示图');
                // console.log(files.length);
                this.value = "" //删除选择
                return;
            }
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
            var files = $("#file_upload")[0].files;//等价于document.getElementById("file1").files;
            for(var i = 0; i < files.length; i++){
                formData.append("fileupload[]",files[i]);   // 文件对象 ,fileupload必须加中括号
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/admins/colors/upload",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        var imgs = $('<img src="'+data[i]+'" alt="" id="imgs'+[i]+'" width="80">');
                        $('#file_upload').after(imgs);
                        var photo = $('<input type="hidden" name="photos[]" value='+data[i]+'>');
                        $('#file_upload').after(photo);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
    })
    $('#divs').delay(1000).slideUp(2000);
</script>
@stop