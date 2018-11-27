@extends('mutual.homes')

@section('title',$title)

@section('content')
<div class="row">
    <div class=" col-md-6 col-md-offset-3">
        <div class="grid_3 grid_5 animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms" style="margin: 0px auto;">
            <h3>提示</h3>
            <div class="well">
                1.恭喜您注册成功
            </div>
            <div class="well">
                2.请您前往您的邮箱进行激活
            </div>
        </div>
    </div>
</div>
@stop

@section('js')

<script>
    setTimeout(function(){
        window.location.href='http://shop.com/';
    },6000);
</script>

@stop
