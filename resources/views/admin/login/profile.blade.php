@extends('mutual.admins')

@section('title',$title)

@section('content')


<div class="col-md-6 col-md-offset-3" style="float: none">
    <form action="/admin/upload" enctype='multipart/form-data'>
    <div class="content-box">
        <div class="head primary-bg clearfix">
            <h5 class="content-title pull-left">修改头像</h5>
            <div class="functions-btns pull-right"></div>
        </div>
        <div class="content">
            <input type="file" class="dropify" data-default-file="">
        </div>
    </div>
    {{csrf_field()}}
<button type="button" class="btn btn-primary">提交</button>      
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