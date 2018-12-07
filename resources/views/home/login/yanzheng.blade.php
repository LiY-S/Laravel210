@extends('mutual.homes')


@section('title', $title)


@section('content');
<style>
    .mail-grid-left input[type="text"], .mail-grid-left input[type="password"], .mail-grid-left textarea {
        outline: none;
        border: 1px solid #E4E4E4;
        background: #f5f5f5;
        font-size: 14px;
        color: #212121;
        padding: 10px;
        width: 100%;
    }
</style>

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
        <h3>忘记密码</h3>
        <p class="est">********************</p>
        <div class="mail-grids">
            <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s" style="margin-left: 380px;">
                <p style="color: orange;"><span style="font-size: 20px;">您</span>的登录<span style="font-size: 20px;">邮箱</span>是：{{$res -> email}}</p>
                <br>
                <form id='art_form' action="/home/xiugmm/{{$res->id}}" method="post" class="mws-form" enctype="multipart/form-data">
                    新 &nbsp;密&nbsp; 码:<input id="passw" type="password" name="password" style="width:360px;" required=""><img id="imgs" src="/homes/images/close.png" style="height:20px;width: 40px;" alt="">
                        <span class="spa"></span><br><br>
                    确认密码:<input type="password" id="repa" name="repass" style="width:400px;" required="">
                        <span class="sp"></span><br><br>
                    {{csrf_field()}}
                    <br>
                    <br>
                    <input style="margin-left: 50px;" type="submit" value="立即修改" >
                </form>
            </div>
            <div class="clearfix"> </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<!-- //mail -->

@stop

@section('js')

<script>
     // 通过ID获取标签元素
        var pass = document.getElementById('passw');
        var imgs = document.getElementById('imgs');
        // 鼠标按下事件
        imgs.onmousedown = function(){
            imgs.src = '/homes/images/open.png';
            pass.type = 'text';
        }
        // 鼠标抬起事件
        imgs.onmouseup = function(){
            imgs.src = "/homes/images/close.png";
            pass.type = 'password';
        }

        $('.alert').delay(2000).fadeOut(2000);
</script>
<script>
    var PS = true;
    $('input[name=password]').focus(function(){
            $(this).css('border','solid 1px orange');
        });
        //失去焦点
    $('input[name=password]').blur(function(){
            var pv = $(this).val();

            if(pv == ''){

                $(this).css('border','solid 1px red');

                PS = false;

                return;
            }

            var reg = /^\S{8,12}$/;

            if(!reg.test(pv)){

                $(this).css('border','solid 1px red');

                PS = false;
            } else {

                $(this).css('border','');
                PS = true;
            }
        })
    //判断两次密码是否一致
    var PASS = true;
    $('#repa').blur(function(){
        var pass = $('#passw').val();
        var repa = $(this).val();
        if (pass != repa) {
            $('.sp').text('两次密码不一致!!!');
            $('.sp').css('color','red');
            PASS = false;
        } else {
            $('.sp').text(' ');
            $('.sp').css('color',' ');
            PASS = true;
        }
    });
    $('#art_form').submit(function(){

        $('#repa').trigger('blur');
        $('input[name=password]').trigger('blur');

        if(PASS && PS){

            return true;
        }
        //var flag = 1   var flag = 0
        return false;
    });
</script>


@stop