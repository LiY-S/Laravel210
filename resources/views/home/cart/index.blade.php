@extends('mutual.homes')
    <meta name="csrf-token" content="{{ csrf_token() }}">


@section('title',$title)

@section('content')

<div class="checkout">
    <div class="container">
        <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>选择</th>
                        <th>商品名</th>
                        <th>图片</th>
                        <th>单价(元)</th>
                        <th>数量</th>
                        <th>总价(元)</th>
                        <th>操作</th>
                    </tr>
                </thead>
                @foreach( $data as $k => $v)
                <tr class="rem1">
                    <td class="cart-product-thumbnail">
                        <input type="checkbox" class='che' gid='{{$v->id}}'>
                    </td>
                    <td class="invert">{{$v->goods_id}}</td>
                    <td class="invert-image">{{$v->goods_nature}}</td>
                    <td class="invert danjia">{{$v->goods_prices / $v->goods_count}}</td>
                    <td class="invert">
                         <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>{{$v->goods_count}}</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert shanp">{{$v->goods_prices}}</td>
                    <td class="invert">
                        <div class="rem">
                            <div class="close1"> </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <ul>
                    <li style="font-size: 20px;">总计<span style="font-size: 30px;" id="total">0</span><span style="font-size: 30px;">¥</span></li>
                </ul>
                <a href="#"><h4>去结算</h4></a>

            </div>
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="/" id="qugouwu"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>去 购 物</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@stop

@section('js')
<!--quantity-->
    <script>
        $('.value-plus').on('click', function(){
            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
            divUpd.text(newVal);
            // 定义商品总价添加到页面中
            var shangp = $(this).parents('tr').find('.shanp');
            // 查找商品的单价
            var shangpin = $(this).parents('tr').find('.danjia').text();

            var sp = parseFloat(shangpin);
            // 定义商品总价格
            var zongjia = (sp * newVal);
            shangp.text(zongjia);
            // console.log(zongjia);
            totals();
        });
        $('.value-minus').on('click', function(){
            var divUpd = $(this).parent().find('.value');
            var divu = divUpd.text();
            var newVal = parseInt(divu);
            newVal--;
            if(newVal<1){
                newVal = 1;
            }
            divUpd.text(newVal);
            // console.log(newVal);
            // 定义商品总价添加到页面中
            var shangp = $(this).parents('tr').find('.shanp');
            // 查找商品的单价
            var shangpin = $(this).parents('tr').find('.danjia').text();

            var sp = parseFloat(shangpin);
            // 定义商品总价格
            var zongjia = (sp * newVal);
            shangp.text(zongjia);
            // console.log(zongjia);
            totals();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //删除数据
        $('.rem').click(function(){
            //提示信息
            var res = confirm('你确定删除吗??');

            if(!res) return;
             //参数发送到控制器中
             //获取id
            var gid = $(this).parents('tr').find('.che').attr('gid');

            var rem = $(this);

            $.post('/home/shopcart',{gid:gid},function(data){
                if (data == 1) {
                    rem.parents('tr').remove();
                }
            });

        });

        //选择
        $('.che').click(function(){

            totals()
        })


        function totals()
        {
            function accAdd(arg1,arg2){
                var r1,r2,m;
                try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
                try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
                m=Math.pow(10,Math.max(r1,r2))
                return (arg1*m+arg2*m)/m
            }

            var pcr = 0;

            var sum = 0;
            //遍历
            $(':checkbox:checked').each(function(){

                //获取小计
                pcr = parseFloat($(this).parents('tr').find('.shanp').text());

                sum = accAdd(sum, pcr);

            })

            //让总计发生改变
            $('#total').text(sum);
        }
    </script>
<!--quantity-->

@stop