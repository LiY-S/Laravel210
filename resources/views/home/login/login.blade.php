@extends('mutual.homes')

@section('title',$title)

@section('content')
<!-- login -->
<div class="login">
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">登录</h3>
        <p class="est animated wow zoomIn" data-wow-delay=".5s">淘 鞋 吧 用 户 , 欢 迎 您</p>
        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                @if(session('error'))
                    <div class="alert alert-info error">
                        <li style='list-style:none;font-size:14px'>{{session('error')}}</li>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-warning success">
                        <li style='list-style:none;font-size:14px'>{{session('success')}}</li>
                    </div>
                @endif
            <form action="/home/dologin" method="get">
                <input type="email" name="email" placeholder="请输入邮箱地址" required=" ">
                <input type="password" name="password" placeholder="请输入密码" required=" ">
                <div class="forgot">
                    <a href="/home/forget">忘记密码?</a>
                </div>
                {{csrf_field()}}
                <input type="submit" value="登录">
            </form>
        </div>
        <h4 class="animated wow slideInUp" data-wow-delay=".5s">对于新用户</h4>
        <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="/home/regist">注册</a> (或) 前往 <a href="/">首页<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
    </div>
</div>

@stop

@section('js')
<script>
    $('.alert').delay(2000).fadeOut(2000);
</script>

@stop