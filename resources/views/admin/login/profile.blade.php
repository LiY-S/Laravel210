@extends('mutual.admins')

@section('title',$title)

@section('content')

<div class="col-md-6 col-md-offset-3" style="float: none;height: 740px">
	<form id='art_form' action="/admin/upload" method="post" class="mws-form" enctype='multipart/form-data'>
		<center>
<img src="{{$res->profile}}" id='imgs' alt="上传后显示图片" style="width:200px; ">
</center><br><br><br> 
    <div class="content-box">
        <div class="head primary-bg clearfix">
            <h5 class="content-title pull-left">修改头像</h5>
            <div class="functions-btns pull-right"></div>
        </div>
        <div class="content">

            <input id="file_upload" type="file" class="dropify" name='profile'>
        </div>
    </div>
    {{csrf_field()}}
<a class="btn btn-primary" href="/admin" style="color:#fff; width:100px">修改</a>      
</form> 
</div>	


@stop

@section('js')

<script type="text/javascript">
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

	        var formData = new FormData($('#art_form')[0]);

	        $.ajax({
	            type: "POST",
	            url: "/admin/upload",
	            data: formData,
	            contentType: false,
	            processData: false,
	            success: function(data) {
	                $('#imgs').attr('src',data);
	                // $('#art_thumb').val(data);

	                setTimeout(function(){
	                location.href = '/admin';
	                },1000)

	            },
	            error: function(XMLHttpRequest, textStatus, errorThrown) {
	                alert("上传失败，请检查网络后重试");
	            }
	        });
        })
    })
</script>
<script src="/admins/admins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/admins/admins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/admins/admins/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="/admins/admins/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js"></script>
<script src="/admins/admins/bower_components/Waves/dist/waves.min.js"></script>
<script src="/admins/admins/bower_components/toastr/toastr.js"></script>

<script src="/admins/admins/js/dropify/js/dropify.min.js"></script>
<script src="/admins/admins/js/common.js"></script>


<script>
$('.dropify').dropify();
</script>
@stop