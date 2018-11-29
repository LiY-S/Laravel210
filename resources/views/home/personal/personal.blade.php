@extends('mutual.homes')


@section('title', $title)


@section('content');


<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">个人中心</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- mail -->
<div class="mail animated wow zoomIn" data-wow-delay=".5s">
    <div class="container">
        <h3>个人中心</h3>
        <p class="est">随心更改您的个人信息</p>
        <div class="mail-grids">
            <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <form id='art_form' action="/admin/upload" method="post" class="mws-form" enctype='multipart/form-data'>
                    昵称:<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                    邮箱:<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    手机:<input type="text" value="tel" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'tel';}" required="">
                    头像:
                    <div class="mws-form-row">
                        <div style="position: relative;" class="fileinput-holder">
                            <img src="/homes/images/3.png" id='imgs' alt="上传后显示图片" >
                            <input id="file_upload" type="file" name='profile' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 100px; opacity: 0; z-index: 200;">
                        </div>
                    </div>
                    {{csrf_field()}}
                    个人简介:<textarea type="text" required="">这个人很懒,什么都没有留下! ! !</textarea>
                    <input type="submit" value="保存" >
                </form>
            </div>
            <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">

                <div class="mail-grid-right1" style="margin-top: 100px;">
                    <a href="javascript:void(0);" style="color: #fff;"><<< 个人资料</a>
                </div>
                <br>
                <div class="mail-grid-right1">
                    <a href="" style="color: #fff;">收货地址管理</a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //mail -->

@stop

@section('js')
<script type="text/javascript">
    $(function () {
        $("#file_upload").change(function () {
            var imgPath = $("#file_upload").val();
            console.log(imgPath);
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
            // console.log(imgPath);
            var formData = new FormData($('#art_forms')[0]);
            console.log(formData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/home/upload",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#imgs').attr('src',data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
    })
</script>

@stop