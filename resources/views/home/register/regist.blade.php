@extends('mutual.homes')

@section('title',$title)

@section('content')

<style>
    input[type="tel"] {
        outline: none;
        border: 1px solid #DBDBDB;
        padding: 10px 10px 10px 45px;
        font-size: 14px;
        color: #999;
        display: block;
        width: 100%;
        background: url(/homes/images/tel.png) no-repeat #fff;
        margin: 1em 0 0;
    }

</style>
    <div class="register">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">注 册</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">欢迎您,您即将成为淘鞋吧的一名用户 </p>
            <div class="login-form-grids">
                <form id="forms" class="animated wow slideInUp" action="/home/doregist" method="post" data-wow-delay=".5s">
                    <input type="email" placeholder="请输入邮箱" name="email"><span></span>
                    <input type="password" placeholder="请输入密码" name="password"><span></span>
                    <input type="password" placeholder="确认密码" name="repass"><span></span>
                    <input type="tel" placeholder="请输入手机号" name="phone"><span></span>
                    <div class="register-check-box">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i><span id='xieyi'>阅读并接受《淘鞋吧用户协议》及《淘鞋吧隐私权保护声明》</span></label>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <input type="submit" value="注 册">
                </form>
            </div>
            <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                <a href="/">Home</a>
            </div>
        </div>
    </div>

@stop

@section('js')

    <script>


        //
        $('input[name=checkbox]').click(function(){
            $('#xieyi').css('color','');
        });
        // 对表单进行验证

        var EMA = true;
        var PS = true;
        var RPS = true;
        var PH = true;
        var CV = true;
        //邮箱
        //获取焦点事件
        $('input[name=email]').focus(function(){
            $(this).css('border','solid 1px orange');
        })
        //失去焦点事件
        $('input[name=email]').blur(function(){
            //获取输入的值
            var ema = $(this).val().trim();
            if(ema == ''){
                $(this).css('border','solid 1px red');
                EMA = false;
                return;
            }
            $(this).css('border','');

        });
        //密码
        $('input[name=password]').focus(function(){
            $(this).css('border','solid 1px orange');
        })
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

        //确认密码
        $('input[name=repassword]').focus(function(){
            $(this).css('border','solid 1px orange');
        })

        //失去焦点
        $('input[name=repass]').blur(function(){

            //获取密码
            var pvs = $('input[name=password]').val().trim();
            //获取确认密码
            var rpv = $(this).val().trim();
            if(rpv == ''){

                $(this).css('border','solid 1px red');
                RPS = false;
                return;
            }

            if(pvs != rpv){
                $(this).css('border','solid 1px red');
                RPS = false;
            } else {
                $(this).next().text(' ').css('color','');
                $(this).css('border','');
                RPS = true;
            }
        })

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
                PH = false;
            } else {

                $(this).css('border','');
                PH = true;
            }
        })


        $('#forms').submit(function(){

            var check = $('input[name=checkbox]').attr('checked');
            // console.log(check);
            if (!check) {
                // 获取 i标签 给i标签添加颜色
                $('#xieyi').css('color','red');
                return false;
            }

            $('input[name=phone]').trigger('blur');
            $('input[name=repass]').trigger('blur');
            $('input[name=password]').trigger('blur');
            $('input[name=email]').trigger('blur');

            if(EMA && PS && RPS && PH){

                return true;
            }
            //var flag = 1   var flag = 0
            return false;
        })
    </script>

@stop
