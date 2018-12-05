@extends('mutual.homes')


@section('title', $title)


@section('content');

<link type="text/css" rel="stylesheet" href="/homes/shgl/css.css" />
<script src="/homes/shgl/location.js"></script>


<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">收货地址管理</li>
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
    <div class="container" style="margin-left: 500px;">
        <form id="forms" style="width: 500px;" action="/home/tiajia" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">
                    收货人：
                </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="consignee" placeholder="请输入收货人的姓名">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">
                    手机号：
                </label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="请输入收货人的电话">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">
                    地区：
                </label>

                <div class="info">
                    <div>
                        <select id="s_province" name="province"></select>  
                        <select id="s_city" name="city" ></select>  
                        <select id="s_county" name="county"></select> &nbsp; &nbsp; <span></span>
                        <script class="resources library" src="/homes/shgl/area.js" type="text/javascript"></script>
                        <script type="text/javascript">_init_area();</script>
                    </div>
                    <div id="show"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
            </div>
            <div class="form-group" style="width: 500px;margin-left: 515px;">
                <label for="exampleInputPassword1">
                    地址：
                </label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="请输入您的收货地址的详细地址">
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-info" style="margin-left: 515px;">添加</button>
        </form>
    </div>
</div>
<!-- //mail -->

@stop


@section('js')

<script type="text/javascript">
    var Gid  = document.getElementById ;
    var showArea = function(){
        Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
        Gid('s_city').value + " - 县/区" +
        Gid('s_county').value + "</h3>"
    }
    Gid('s_county').setAttribute('onchange','showArea()');
</script>
<script>
    // 判断用户名
    var USE = true;
    $('input[name=consignee]').focus(function(){
        $(this).css('border','solid 1px orange');
    })

    $('input[name=consignee]').blur(function(){

        var user = $(this).val().trim();

        if(user == ''){

            $(this).css('border','solid 1px red');
            USE = false;
            return;
        }

        var reg = /^[\u4e00-\u9fa5_a-zA-Z0-9]{2,12}$/;
        if(!reg.test(user)){

            $(this).css('border','solid 1px red');
            USE = false;
        } else {

            $(this).css('border','');
            USE = true;
        }
    });
    //判断手机号是否符合要求
    var PH = true;
    $('input[name=phone]').focus(function(){
        $(this).css('border','solid 1px orange');
    });

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
    });

    // 设置区域为空时
    var COU = true;
    $('#s_county').focus(function(){
        $(this).css('border','solid 1px orange');
    });

    $('#s_county').blur(function(){

        var county = $(this).val().trim();

        if(county == '市、县级市'){
            $(this).next().text('请选择地区！！');
            $(this).next().css('color','red');
            COU = false;
            return;
        } else {
            $(this).next().css('color','');
            $(this).next().text('');
            $(this).css('border','');
            COU = true;
        }


    });

    // 判断 详细地址
    var ADD = true;
    $('input[name=address]').focus(function(){
        $(this).css('border','solid 1px orange');
    });

    $('input[name=address]').blur(function(){

        var address = $(this).val().trim();

        if(address == ''){
            $(this).css('border','solid 1px red');
            ADD = false;
            return;
        } else{
            $(this).css('border','solid 1px #fff');
            ADD = true;

        }

    });


    $('#forms').submit(function(){

        $('input[name=consignee]').trigger('blur');
        $('input[name=address]').trigger('blur');
        $('input[name=phone]').trigger('blur');
        $('#s_county').trigger('blur');

        if(USE && PH && ADD && COU){

            return true;
        }
        //var flag = 1   var flag = 0
        return false;
    });
</script>

@stop