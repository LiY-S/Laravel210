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
                <form class="animated wow slideInUp" action="/home/doregist" data-wow-delay=".5s">
                    <input type="email" placeholder="请输入邮箱" name="username">
                    <input type="password" placeholder="请输入密码" name="password">
                    <input type="tel" placeholder="请输入手机号" name="phone">
                    <div class="register-check-box">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i><span id='xieyi'>阅读并接受《淘鞋吧用户协议》及《淘鞋吧隐私权保护声明》</span></label>
                        </div>
                    </div>
                    <input type="submit" value="Register">
                </form>
            </div>
            <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                <a href="index.html">Home</a>
            </div>
        </div>
    </div>

@stop

@section('js')

    <script>

        $('input[type=submit]').click(function(){
            // 获取 checkbox 的值
            var check = $('input[name=checkbox]').attr('checked');
            // console.log(check);
            if (!check) {
                // 获取 i标签 给i标签添加颜色
                $('#xieyi').css('color','red');
                return false;
            }
        });

    </script>

@stop
