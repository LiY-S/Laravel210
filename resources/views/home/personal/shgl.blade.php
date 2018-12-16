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
        <h3>收货地址</h3>
        <p class="est">添加或修改您的收货地址</p>
        <div class="mail-grids">


                @if(session('success'))
                    <div class="alert alert-warning success">
                        <li style='list-style:none;font-size:14px'>{{session('success')}}</li>
                    </div>
                @endif

            <div class="col-md-8 mail-grid-left animated wow slideInLeft" id="abcde" data-wow-delay=".5s">
                <div style="height: 50px;"><a href="javascript:void(0)" id="tianjiash"  aaa="1" class="btn btn-default">添加收货地址</a> &nbsp; <span style="color: #ccc; font-size: 12px;">最多添加5个收货地址</span></div>

                @foreach($data as $key => $value)

                <ul class="sm easebuy-m " id="addresssDiv-138423516"  style="border:solid 1px #eee;">
                    <div class="smt">
                        <div class="extra"  style="float: right;">
                            <input type="hidden" value="{{$value->id}}">
                            @if($value->status == 1)
                            <span><a href="javascript:void(0)" class="sheweimr">默认</a> &nbsp; &nbsp; &nbsp; &nbsp;</span>
                            @else
                            <span><a href="javascript:void(0)" class="sheweimr">设为默认</a> &nbsp; &nbsp; &nbsp; &nbsp;</span>
                            @endif
                            <a href="javascript:void(0);">
                                <input type="hidden" value="{{$value->id}}">
                                <span class="glyphicon glyphicon-pencil" id="xiugai"></span>
                            </a>&nbsp;&nbsp;&nbsp;
                            <a class="del-btn" href="javascript:void(0)">
                                <input type="hidden" value="{{$value->id}}">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                            </a>
                        </div>
                    </div>
                    <div class="smc">
                        <div class="items new-items">
                            <div class="item-lcol">
                                <div class="item">
                                    <span>收货人：</span><span>{{$value->consignee}}</span>
                                    <div class="clr"></div>
                                </div>
                                <div class="item">
                                    <span>所在地区：</span><span>{{$value->province}}-{{$value->city}}-{{$value->county}}</span>
                                    <div class="clr"></div>
                                </div>
                                <div class="item">
                                    <span>地址：</span><span class="fl">{{$value->address}}</span>
                                    <div class="clr"></div>
                                </div>
                                <div class="item">
                                    <span>手机：</span><span class="fl">{{$value->phone}}</span>
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div>
                </ul>
                @endforeach
            </div>
            <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
                <div class="mail-grid-right1">
                    <a href="/home/personal?id={{$uid}};" style="color: #fff;">个人资料</a>
                </div>
                <br>
                <div class="mail-grid-right1">
                    <a href="JavaScript:viod(0)" style="color: #fff;"><<< 收货地址管理</a>
                </div>
                <br>
                <div class="mail-grid-right1">
                    <a href="/home/mima?id={{$uid}}" style="color: #fff;">修改密码</a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- 弹出修改密码的页面 -->
<style>
    /* login */
    .login{width:500px;height:400px;position:fixed;border:#ebebeb solid 1px;top:25%;left:50%;display:none;background:#ffffff;box-shadow:0px 0px 20px #ddd;z-index:9999;margin-left:-250px;}
    .login-title{width:100%;text-align:center;line-height:40px;height:40px;font-size:18px;position:relative;margin-top: -70px;}
    .login-title span{position:absolute;font-size:12px;right:-20px;top:-30px;background:#ffffff;border:#ebebeb solid 1px;width:40px;height:40px;border-radius:20px;}
    .login-title span a{display:block;}
    .login-input-content{margin-top:20px;}
    .login-input {overflow:hidden;margin:0px 0px 20px 0px;}
    .login-input label{float:left;width:90px;padding-right:10px;text-align:right;line-height:35px;height:35px;font-size:14px;}
    .login-input input.list-input{float:left;line-height:35px;height:35px;width:350px;border:#ebebeb 1px solid;text-indent:5px;}
    .login-button{width:50%;margin:30px auto 0px auto;line-height:40px;font-size:14px;border:#ebebeb 1px solid;text-align:center;}
    .login-button a{display:block;}
    .login-bg{width:100%;height:100%;position:fixed;top:0px;left:0px;background:#ebebeb;filter:alpha(opacity=30);-moz-opacity:0.3;-khtml-opacity:0.3;opacity:0.3;display:none;}
</style>
<div class="login">
    <div class="login-title">修改地址<span><a href="javascript:void(0);" class="close-login">关闭</a></span></div>
    <div class="login-input-content">
        <div class="login-input">
            <label>收货人：</label>
            <input type="text" name="consignee" id="consignee" class="list-input"/>
            <input type="hidden" name="id" id="wangbadan"/>
        </div>
        <div class="login-input">
            <label>手机号：</label>
            <input type="tel" id="phone" name="phone" class="list-input"/>
        </div>
        <div class="login-input">
            <label>地 &nbsp; 区：</label>
                <input type="text" id="s_province" name="s_province" class="list-input" disabled="disabled">
            <div style="clear:both;"></div>
        </div>
        <div class="login-input">
            <label>地 &nbsp; 址：</label>
            <input type="text" name="address" id="address" class="list-input"/>
        </div>
    </div>
    <div class="login-button"><a href="javascript:void(0);" id="login-button-submit">确认修改</a></div>
</div>
<div class="login-bg"></div>
<!-- //mail -->
@stop

@section('js')

<script>
    $('.alert').delay(2000).fadeOut(2000);
</script>
<!-- 删除收货地址 -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.glyphicon-remove-sign').click(function(){
        var res = confirm('你确定删除吗??');
        if(!res) return;

        var aid = $(this).prev().val();
        var rem = $(this);
        // 发送ajax
        $.post('/home/remov',{aid:aid},function(data){
            if (data == 1) {
                rem.parents('ul').remove();
            }
        });

    });
</script>
<!-- 设置添加收货地址的限制 -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#tianjiash').click(function(){
        var tain = $(this);
        // var tian = return true;
        // 发送ajax
        $.post('/home/shglxz',function(data){
            // console.log(data);
            if (data == 1) {
                location.href="/home/tianshgl";
                // tian;
            } else {
                alert('收货地址最多五个，请酌情删除，再进行添加！！！');
            }
        });
        return false;
    });
</script>
<!-- 三级联动 -->
<script type="text/javascript">
    var Gid  = document.getElementById ;
    var showArea = function(){
        Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
        Gid('s_city').value + " - 县/区" +
        Gid('s_county').value + "</h3>"
    }
    Gid('s_county').setAttribute('onchange','showArea()');
</script>
<!-- 修改收货地址 -->
<script>
    $(function () {
        H_login = {};
        H_login.openLogin = function(){
            $('.glyphicon-pencil').click(function(){
                $('.login').show();
                $('.login-bg').show();
                var xgsh = $(this).prev().val();
                // console.log(xgsh);
                // 发送ajax
                $.get('/home/xiugaishdz',{xgsh:xgsh},function(data){
                    // console.log(data[0].province);
                    $('#consignee').val(data[0].consignee);
                    $('#phone').val(data[0].phone);
                    $('#s_province').val(data[0].province+'-'+data[0].city+'-'+data[0].county);
                    $('#address').val(data[0].address);
                    $('#wangbadan').val(data[0].id);
                });
            });
        };
        H_login.closeLogin = function(){
            $('.close-login').click(function(){
                $('.login').hide();
                $('.login-bg').hide();
                // 获取form表单中的值

            });
        };
        H_login.loginForm = function () {
            $("#login-button-submit").on('click',function(){
                    var reg = /^[\u4e00-\u9fa5_a-zA-Z0-9]{2,12}$/;
                    var regph = /^1[3456789]\d{9}$/;
                    var consigneeval = $('#consignee').val();
                    var phoneval = $('#phone').val();
                    var addressval = $('#address').val();
                if(consigneeval == ""){
                    $('#consignee').focus();
                    return false;
                }else if(!reg.test(consigneeval)){
                    $('#consignee').focus();
                    return false;
                }else if(phoneval == ""){
                    $('#phone').focus();
                    return false;
                }else if(!regph.test(phoneval)){
                    $('#phone').focus();
                    return false;
                }else if (phoneval == ""){
                    $('#address').focus();
                    return false;
                } else {

                    $.get('/home/ajaxxgdz',{id:$('#wangbadan').val(),addressval:addressval,phoneval:phoneval,consigneeval:consigneeval},function(data){
                        // console.log(data);
                        if (data == 1) {
                                alert("修改成功");
                                setTimeout(function(){
                                    $('.login').hide();
                                    $('.login-bg').hide();
                                    $('.list-input').val('');
                                },1000);
                                location.reload(true);
                        }
                    })
                }
            });
        };
        H_login.run = function () {
            this.closeLogin();
            this.openLogin();
            this.loginForm();
        };
        H_login.run();
    });
</script>
<script>
    $('.sheweimr').click(function(){
        var abc = $(this);
        var sid = $(this).parent().prev().val();
        // console.log(sid);
        $.get('/home/dzajax',{id:sid},function(data){
            // console.log(data);
            if (data == '1') {
                $('#abcde').find('.sheweimr').text('设为默认');
                abc.text('默认');
            }
        })
    })
</script>
@stop