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
<!-- mail -->
<div class="mail animated wow zoomIn" data-wow-delay=".5s">
    <div class="container">
        <h3>修改密码</h3>
        <p class="est">更改您的密码</p>
            <div class="mail-grids">
                <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">

                    @if(session('error'))
                        <div class="alert alert-info error">
                            <li style='list-style:none;font-size:14px'>{{session('error')}}</li>
                        </div>
                    @endif

                    <form id='art_form' action="/home/personal/update?id={{$uid}}" method="post" class="mws-form">
                        新 &nbsp;密&nbsp; 码:<input id="passw" type="password" name="password" style="width:360px;" required=""><img id="imgs" src="/homes/images/close.png" style="height:20px;width: 40px;" alt="">
                        <span class="spa"></span><br><br>
                        确认密码:<input type="password" id="repa" name="repass" style="width:400px;" required="">
                        <span class="sp"></span><br><br>
                        验 &nbsp;证&nbsp; 码:<input type="text" name="code" style="width:235px;" required="">&nbsp;&nbsp;&nbsp;&nbsp;<a id="but" class="btn btn-default" style="height:40px; width: 150px; background-color: #eee;">点击获取验证码</a><br>
                        <span id="spans" style="margin-left: 80px;"></span>
                        {{csrf_field()}}
                        <br>
                        <br>
                        <br>
                        <input type="submit" value="修改" style="margin-left: 100px;">
                    </form>
                </div>
                <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">

                    <div class="mail-grid-right1">
                        <a href="/home/personal?id={{$uid}};" style="color: #fff;">个人资料</a>
                    </div>
                    <br>
                    <div class="mail-grid-right1">
                        <a href="/home/shgl?id={{$uid}}" style="color: #fff;">收货地址管理</a>
                    </div>
                    <br>
                    <div class="mail-grid-right1">
                        <a href="javascript:void(0);" style="color: #fff;"><<< 修改密码</a>
                    </div>
                </div>
                <div class="clearfix"> </div>
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
        $('input[name=email]').trigger('blur');

        if(PASS){

            return true;
        }
        //var flag = 1   var flag = 0
        return false;
    });
</script>
<script>
        //获取验证码
        $('#but').click(function(){
            // post要使用的请求头
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //发送ajax
            $.post('/home/checkphone',function(data){
                // console.log(data);
            })
        });
        //获取验证码
        $('input[name=code]').focus(function(){
            // $(this).addClass('cur');
            $('#spans').text(' *请输入手机上获取到的验证码').css('color','#111');

            $(this).css('border','solid 1px #fff');

        })

        $('input[name=code]').blur(function(){
            ///获取验证码
            var cd = $(this).val().trim();

            if(cd == ''){
                $('#spans').text(' *验证码不能为空').css('color','#e53e41');

                $(this).css('border','solid 1px #e53e41');

                CV = false;
                return;
            } else {
                $('#spans').text(' ').css('color',' ');

                $(this).css('border','solid 1px #fff');
            }
            var cs = $(this);
            //发送ajax
            $.get('/home/checkcode',{code:cd},function(data){
                if(data == '0'){
                    cs.next().text(' *验证码不正确').css('color','#e53e41');
                    cs.css('border','solid 1px #e53e41');
                    CV = false;
                } else {
                    cs.next().text(' *√').css('color','green');
                    cs.css('border','solid 1px green');
                    CV = true;
                }
            })
        });
</script>
<script>
    $('#but').click(function(){
        var i = 60;
        var but = $(this);
        var info = setInterval(function(){
            but.text('');
            i--;
            if (i > 0) {
                but.text(i+'秒');
                but.attr('disabled','disabled');
            } else {
                clearInterval(info);
                but.text('点击重新获取验证码');
                but.removeAttr('disabled');
            }
        },1000);
    });
</script>
@stop