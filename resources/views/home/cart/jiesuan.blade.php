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

        <div class="col-md-8" id="xxdz" style="margin-left: 352px;display: none; width: 1200px;">
        	@foreach($address as $v1)
        	<input type="hidden" name="dizhi[]" checked value="{{$v1->id}}">

        	<div  class="col-md-3">
        		<table class="timetable_sub">
                        <tr>
                            <th  colspan="2" style="text-align:left;">地址管理</th>
                        </tr>
                    <tr class="rem1">
                        <td class="invert" style="text-align: left;">
        					收货人：{{$v1->consignee}}
                        	<br>
                        	手机:{{$v1->phone}}
                        	<br>
                            区域：{{$v1->province}}-{{$v1->city}}-{{$v1->county}}
                            <br>
                            详细地址：{{$v1->address}}
                        </td>
                        <td>默认</td>
                    </tr>
                </table>
        	</div>
        	@endforeach
        </div>
        <script>
            $("#xxdz").show(1000);
        </script>
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
                        </tr>
                    </thead>
                    <?php $tot = 0; $num =0;?>
                    @foreach($shop as $v)
                    <input type="hidden" name="ids[]" checked value="{{$v->goods_id}}">
                    <input type="hidden" name="price[]" checked value="{{$v->goods_prices}}">
					<input type="hidden" name="gname[]" checked value="{{$v->goods_name}}">
                    <input type="hidden" name="size[]" checked value="{{$v->goods_size}}">
                    <input type="hidden" name="pic[]" checked value="{{$v->goods_pic}}">
                    <tr class="rem1">
                        <td class="invert" style="text-align: left;">
                            商品：{{$v->goods_name}}
                            <br>
                            尺码：{{$v->goods_size}}
                        </td>

                        <td class="invert-image"><img src="{{$v->goods_pic}}" width="100px" alt=""></td>
                        <td class="invert danjia">{{$v->goods_prices}}</td>
                        @foreach($res as $key => $val)

                        @if($key == $v->id)

                        <td class="invert">
                        	<input type="hidden" name="count[]" value="{{$val}}">
                            <div class="shuliang"><span>{{$val}}</span></div>
                        </td>
                        <td class="invert shanp">{{$v->goods_prices * $val}}</td>
                        @php
                            $num += ($v->goods_prices * $val);
                        @endphp

                        @endif

                        @endforeach

                    </tr>
                    @endforeach

                </table>
            </div>

            <div class="checkout-right" text-align="right;">
				<div class="checkout-left-basket animated wow slideInLeft inline" data-wow-delay=".5s">
                    <ul>
                        <li style="font-size: 30px;">总计
                        	<span style="font-size: 30px;" id="total">¥</span><span style="font-size:30px;">{{$num}}</span>
                        </li>
                    </ul>
                </div>
                <div style="float:right; margin-right:0px;" class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <button class="qujiesuan info"><a>立即支付</a></button>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
</div>
</form>

@stop

@section('js')
<script>

</script>
@stop