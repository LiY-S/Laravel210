@extends('mutual.homes')
    <meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<style>
    .qujiesuan{
        border-style:solid;
        border-width:1px;
        border-color:#FFF;
        background: #fff;
        width: 290px;
        height: 40px;
        outline: none;
        /*border:1px;*//*不要设置border*/
    }
</style>


<form action="/home/order" method="post">
{{ csrf_field() }}
<div class="checkout">

        <div class="container">
            <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>商品名</th>
                            <th>图片</th>
                            <th>单价(元)</th>
                            <th>数量</th>
                            <th>总价(元)</th>
                            <th>收货信息</th>
                            <th>订单状态</th>
                            <th>确认收货</th>
                        </tr>
                    </thead>
                    <?php $num =0;?>
                    @foreach($dat as $k => $v)
                    <tr class="rem1">

                        <td class="invert" style="text-align: left;">
                            商品：{{$v->goods_name}}
                            <br>
                            尺码：{{$v->size}}
                        </td>

                        <td class="invert-image"><img src="{{$v->goods_pic}}" width="100px" alt=""></td>
                        <td class="invert danjia">{{$v->goods_prices}}</td>



                        <td class="invert">
                            <div class="shuliang"><span>{{$v->count}}</span></div>
                        </td>
                        <td class="invert shanp">{{$v->goods_prices * $v->count}}</td>

                        @foreach($dz as $va)
                        <td class="invert" style="text-align: left;">

                            收货人：{{$va->consignee}}<?php echo '<br>';?>
                            电话:{{$va->phone}}<?php echo '<br>';?>
                            {{$va->province}}省<?php echo '<br>';?>
                            {{$va->city}}市<?php echo '<br>';?>
                            {{$va->county}}区<?php echo '<br>';?>
                            详细地址:{{$va->address}}<?php echo '<br>';?>
                        </td>

                        @endforeach
                        <td class="invert">
                            @php
                                if($v->status == 1){
                                    echo '未发货';
                            }else if($v->status == 2){
                                    echo '已发货';
                            }else if($v->status == 3){
                                    echo '在途中';
                            }else if($v->status == 4){
                                    echo '配送中';
                            }else if($v->status == 5){
                                    echo '签收';
                            }else if($v->status == 6){
                                    echo '已完成';
                            }
                            @endphp

                        </td>
                        <td>
                            <a href="/home/status?code={{$v->code}}">确认收货</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
</div>
</form>

@stop