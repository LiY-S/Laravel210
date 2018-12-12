@extends('mutual.homes')
    <meta name="csrf-token" content="{{ csrf_token() }}">


@section('title',$title)

@section('content')
<style>
    #qugou li a{
    padding: 10px 30px;
    color: #fff;
    font-size: 1em;
    background: #212121;
    /* text-decoration: none; */
}
</style>
<div class="checkout">
    <div class="container" id="tiantian">
        <ul id="qugou" style="float: right;margin-right: 700px;margin-top: 70px;list-style: none;">
            <li><a href="/"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"><span style="font-size: 22px">去</span><span style="font-size: 25px;">购物</span></a></li>
        </ul>
        <img src="/homes/images/konggouwuche.jpg" width="200" alt="">

    </div>
</div>

@stop

@section('js')

<script>
    $(function(){
        $('#tiantian').hide();
        $('#tiantian').fadeIn(3000);
    });

</script>

@stop