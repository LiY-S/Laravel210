@extends('mutual.admins')

@section('title',$title)

@section('content')
  <script src="/admins/admins/bower_components/jquery/dist/jquery.min.js"></script>

 <style type="text/css">

        .col-md-6{
        	margin-left: 400px;
        }
    </style>
<div class="col-md-6" style="float: none">
    <div class="content-box" style="float: none">
        <div class="head warning-bg clearfix">
            <h5 class="content-title pull-left">
                网站配置
            </h5>
        </div>
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade in" role="alert" id="divs">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('error')}}</strong>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-info alert-dismissible fade in" role="alert" id="divs">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('success')}}</strong>
            </div>
        @endif

        <div class="content">
            <form class="form-horizontal" action="/admins/conf/update" method="post"  enctype='multipart/form-data' name="upfile" id="art_form">
            	<div class="form-group">
                    <label for="inputText" class="col-sm-2 control-label">
                        网站名称
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="c_name" value="{{$res->c_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                        网站关键字
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="keyword" value="{{$res->keyword}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                        网站描述
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="description" value="{{$res->description}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="margin-top: 20px;">
                        网站logo
                    </label>
                    <div class="col-sm-10" style="margin-top: 30px;">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="file" name="values" id="file_upload">
                        <img src="{{$res->values}}" alt="" id="imgs" width="80" style="float: right;margin-top: -50px">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                        网站状态
                    </label>
                    <div style="margin-top:12px">
                        <input type="radio" name="conf_state" value="1" placeholder="" @if ($res->conf_state == 1) checked @endif>开启
                        <input type="radio" name="conf_state" value="0" placeholder="" @if ($res->conf_state == 0) checked @endif>维护
                    </div>
                    </div>
                <div class="form-group" style="">
                		{{csrf_field()}}
                        <input type="submit" class="btn-info col-sm-3 col-sm-offset-5" style="border: 0px;border-radius:5px;height: 50px" value="确认">
                </div>
            </form>
        </div>
    </div>
</div>




<script type="text/javascript">
    // alert($);
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
            var files = $("#file_upload")[0].files;//等价于document.getElementById("file1").files;
            for(var i = 0; i < files.length; i++){
                formData.append("fileupload[]",files[0]);   // 文件对象 ,fileupload必须加中括号
            }
            // console.log(formData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/admins/confs/uploads",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    $('#imgs').attr('src',data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
        $('#divs').delay(1000).slideUp(2000);
    })
    // console.log($('.alert'));
</script>
@endsection