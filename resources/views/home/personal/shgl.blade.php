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

            <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <div style="height: 50px;"><a href="/home/tianshgl" class="btn btn-default">添加收货地址</a> &nbsp; <span style="color: #ccc; font-size: 12px;">最多添加5个收货地址</span></div>

                @foreach($data as $key => $value)

                <ul class="sm easebuy-m " id="addresssDiv-138423516"  style="border:solid 1px #eee;">
                    <div class="smt">
                        <div class="extra">
                            <a class="del-btn" style="float: right;" href="javascript:void(0)">
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
                                    <span>所在地区：</span><span>{{$value->address}}</span>
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
<!-- //mail -->
@stop

@section('js')

<script>
    $('.alert').delay(2000).fadeOut(2000);
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.glyphicon').click(function(){
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

@stop