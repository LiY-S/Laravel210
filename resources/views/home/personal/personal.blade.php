@extends('mutual.homes')


@section('title', $title)


@section('content');


<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
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
                <form id='art_form' action="/home/formupload?id={{$user->id}}" method="post" class="mws-form" enctype="multipart/form-data">
                    昵称:<input type="text" name="username" value="{{$user->username}}" required=""><span class="spa"></span><br>
                    邮箱:<input type="email" name="email" value="{{$user->email}}" disabled="disabled" required=""><span></span><br>
                    手机:<input type="text" name="phone" value="{{$user->phone}}" required=""><span class="sp"></span><br>
                    头像:
                    <div class="mws-form-row">
                        <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$user->profile}}" id='imgs' alt="上传后显示图片"  style="border-radius: 50%;" >
                            <input id="file_upload" type="file" name='profile' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 48px; opacity: 0;">
                        </div>
                    </div>
                    {{csrf_field()}}
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input type="submit" value="保存" >
                </form>
            </div>
            <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">

                <div class="mail-grid-right1">
                    <a href="javascript:void(0);" style="color: #fff;"><<< 个人资料</a>
                </div>
                <br>
                <div class="mail-grid-right1">
                    <a href="/home/shgl?id={{$user->id}}" style="color: #fff;">收货地址管理</a>
                </div>
                <br>
                <div class="mail-grid-right1">
                    <a href="/home/mima?id={{$user->id}}" style="color: #fff;">修改密码</a>
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
            // console.log(imgPath);
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
            // var formData = new FormData($('#art_form')[0]);
            // console.log(formData);

            var formdata = new FormData($('#art_form')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/home/upload",
                data: formdata,
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
    })
</script>
<script>
        $('input[name=checkbox]').click(function(){
            $('#xieyi').css('color','');
        });
        // 对表单进行验证
        var USE = true;
        var EMA = true;
        var PH = true;
        // 用户名
        $('input[name=username]').focus(function(){
            $(this).css('border','solid 1px orange');
        })
        $('input[name=username]').blur(function(){
            //获取输入的值
            var user = $(this).val().trim();
            if(user == ''){
                $(this).css('border','solid 1px red');
                USE = false;
                return;
            }
            var reg = /^[\u4e00-\u9fa5_a-zA-Z0-9]{2,8}$/;
            if(!reg.test(user)){
                $(this).css('border','solid 1px red');
                $('.spa').text('请输入2-8位 中文 数字 字母 下划线');
                $('.spa').css('color','red');
                USE = false;
            } else {
                $('.spa').text('');
                $('.spa').css('color','');

                $(this).css('border','');
                USE = true;
            }

        });
        //邮箱


        //手机号
        $('input[name=phone]').focus(function(){
            $(this).css('border','solid 1px orange');
        })

        $('input[name=phone]').blur(function(){

            var phv = $(this).val().trim();

            if(phv == ''){

                $(this).css('border','solid 1px red');
                PH = false;
                return;
            }

            var reg = /^1[3456789]\d{9}$/;
            if(!reg.test(phv)){
                $(this).css('border','solid 1px red');
                $('.sp').text('请输入6-12位 数字 字母 下划线');
                $('.sp').css('color','red');
                PH = false;
            } else {
                $('.sp').text('');
                $('.sp').css('color','');

                $(this).css('border','');
                PH = true;
            }
        })


        $('#art_form').submit(function(){

            $('input[name=phone]').trigger('blur');
            $('input[name=repass]').trigger('blur');
            $('input[name=email]').trigger('blur');

            if(USE && PH){

                return true;
            }
            //var flag = 1   var flag = 0
            return false;
        })
</script>
@stop