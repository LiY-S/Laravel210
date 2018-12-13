@extends('mutual.homes')


@section('title',$title)

@section('content')

<!-- banner -->

<style>
.flexslider {
    margin: 0px auto 20px;
    position: relative;
    width: 100%;
    height: 482px;
    overflow: hidden;
    zoom: 1;
}

.flexslider .slides li {
    width: 100%;
    height: 100%;
}

.flex-direction-nav a {
    width: 70px;
    height: 70px;
    line-height: 99em;
    overflow: hidden;
    margin: -35px 0 0;
    display: block;
    background: url(/homes/lbt/images/ad_ctr.png) no-repeat;
    position: absolute;
    top: 50%;
    z-index: 10;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    -webkit-transition: all .3s ease;
    border-radius: 35px;
}

.flex-direction-nav .flex-next {
    background-position: 0 -70px;
    right: 0;
}

.flex-direction-nav .flex-prev {
    left: 0;
}

.flexslider:hover .flex-next {
    opacity: 0.8;
    filter: alpha(opacity=25);
}

.flexslider:hover .flex-prev {
    opacity: 0.8;
    filter: alpha(opacity=25);
}

.flexslider:hover .flex-next:hover,
.flexslider:hover .flex-prev:hover {
    opacity: 1;
    filter: alpha(opacity=50);
}

.flex-control-nav {
    width: 100%;
    position: absolute;
    bottom: 10px;
    text-align: center;
}

.flex-control-nav li {
    margin: 0 2px;
    display: inline-block;
    zoom: 1;
    *display: inline;
}

.flex-control-paging li a {
    background: url(/homes/lbt/images/dot.png) no-repeat 0 -16px;
    display: block;
    height: 16px;
    overflow: hidden;
    text-indent: -99em;
    width: 16px;
    cursor: pointer;
}

.flex-control-paging li a.flex-active,
.flex-control-paging li.active a {
    background-position: 0 0;
}

.flexslider .slides a img {
    width: 100%;
    height: 482px;
    display: block;
}
</style>
<div id="banner_tabs" class="flexslider">
    <ul class="slides">
         @foreach($res as $k=>$v)
        <li>
            <a title="" target="_blank" href="{!!$v->ad_a!!}">
                <img width="1920" height="482" alt="" style="background: url({!!$v->ad_src!!}) no-repeat center;" src="/homes/lbt/images/alpha.png">
            </a>
        </li>
       @endforeach
    </ul>
    <ul class="flex-direction-nav">
        <li><a class="flex-prev" href="javascript:;">Previous</a></li>
        <li><a class="flex-next" href="javascript:;">Next</a></li>
    </ul>
    <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
        @for($i=1;$i<=$zs;$i++)
            <li><a>{{$i}}</a></li>
        @endfor
   </ol>
</div>


<!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="banner-bottom-grids">
                <div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                    <div class="grid">
                        <figure class="effect-julia">
                            <img src="/homes/images/4.jpg" alt=" " class="img-responsive" />
                            <figcaption>
                                <h3>Best <span>Store</span><i> in online shopping</i></h3>
                                <div>
                                    <p>Cupidatat non proident, sunt</p>
                                    <p>Officia deserunt mollit anim</p>
                                    <p>Laboris nisi ut aliquip consequat</p>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
                    <div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
                        <div class="banner-bottom-grid-left-grid1">
                            <img src="/homes/images/1.jpg" alt=" " class="img-responsive" />
                        </div>
                        <div class="banner-bottom-grid-left1-pos">
                            <p>Discount 45%</p>
                        </div>
                    </div>
                    <div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
                    <ul id="gonggao">
                        @foreach($gonggao as $va)
                        <li><a href="/home/notice/{{$va->id}}">{{$va->title}}
                            <span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>
                            <span>{{date('Y-m-d H:i',$va->tiantime)}}</span></a></li>
                        @endforeach
                    </ul>
                    </div>
                </div>
                <div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
                    <div class="banner-bottom-grid-left-grid grid-left-grid1">
                        <div class="banner-bottom-grid-left-grid1">
                            <img src="/homes/images/3.jpg" alt=" " class="img-responsive" />
                        </div>
                        <div class="grid-left-grid1-pos">
                            <p>top and classic designs <span>2016 Collection</span></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<!-- //banner-bottom -->



<!-- collections -->
    <div class="new-collections">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">猜你喜欢</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">生命在于矛盾，在于运动，一旦矛盾消除，运动停止，生命也就结束了。<br>德国著名思想家&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;歌德</p>
            <div class="new-collections-grids">
                @foreach ($goods as $v)
                <div class="col-md-3 new-collections-grid">
                    <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                        <div class="new-collections-grid1-image">
                            <a href="/home/single/{{$v->id}}" class="product-image"  target="view_window"><img src="{{$v->photo[0]}}" alt=" " class="img-responsive" /></a>
                            <div class="new-collections-grid1-image-pos">
                                <a href="/home/single/{{$v->id}}"  target="view_window">查看详情</a>
                            </div>
                        </div>
                        <h4><a href="/home/single/{{$v->id}}"  target="view_window">{{$v->goods_name}}</a></h4>
                        <div class="new-collections-grid1-left simpleCart_shelfItem">
                            <p><span class="item_price" style="color:#ff5000">￥{{$v->goods_price}}</span><a class="item_add" href="/home/single/{{$v->id}}">去购买</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<!-- //collections -->



<!-- new-timer -->
    <div class="timer">
        <div class="container">
            <div class="timer-grids">
                <div class="col-md-8 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                    <h3>新品首发</h3>
                    <div class="new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price">
                        <p><span class="item_price" style="color:#ff5000">￥{{$newGoods->goods_price}}</span></p>
                        <h4>{{$newGoods->goods_name}}</h4>
                        <p><a class="item_add timer_add" href="/home/single/{{$newGoods->id}}">去购买</a></p>
                    </div>
                    <div id="counter"> </div>
                    <script src="/homes/js/jquery.countdown.js"></script>
                    <script src="/homes/js/script.js"></script>
                </div>
                <div class="col-md-4 timer-grid-right animated wow slideInRight" data-wow-delay=".5s">
                    <div class="timer-grid-right1">
                        <a href="/home/single/{{$newGoods->id}}"><img src="{{$newGoods->photo[0]}}" alt=" " class="img-responsive" /></a>
                        <div class="timer-grid-right-pos">
                            <h4>New</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<!-- //new-timer -->





@stop

@section('js')

<script src="/homes/lbt/js/jquery-1.10.2.min.js"></script>
<script src="/homes/lbt/js/slider.js"></script>
<script type="text/javascript">
$(function() {
    var bannerSlider = new Slider($('#banner_tabs'), {
        time: 5000,
        delay: 400,
        event: 'hover',
        auto: true,
        mode: 'fade',
        controller: $('#bannerCtrl'),
        activeControllerCls: 'active'
    });
    $('#banner_tabs .flex-prev').click(function() {
        bannerSlider.prev()
    });
    $('#banner_tabs .flex-next').click(function() {
        bannerSlider.next()
    });
})
</script>

<!-- 公告管理 -->

<script>
    setInterval(function(){
            $('#gonggao li').first().slideUp('slow',function(){
                $('#gonggao').last().append($(this).show())
            });
        },3000);
</script>
@stop