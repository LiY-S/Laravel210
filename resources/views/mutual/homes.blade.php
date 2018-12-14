<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="/homes/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/homes/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="/homes/js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="/homes/js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="/homes/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- timer -->
<link rel="stylesheet" href="/homes/css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->
<link href="/homes/css/animate.min.css" rel="stylesheet">
<script src="/homes/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>

<body>
<!-- header -->
    <div class="header">

        @php
            $poster = DB::table('poster')->get();
        @endphp
        @foreach($poster as $v)
        <div class="banner-pic" align="center" id="my_img">
            <ul>
              <li style="background-color:{{$v->bgcolor}}; overflow:hidden;">
                <button style="float: right;" onclick="document.getElementById('my_img').style.display='none';">X</button>
                  <a href="{{$v->url}}" target="_blank" name="">
                    <img src="{{$v->pics}}" alt="365天放心购" class="ad" title="{{$v->title}}"/>
                  </a>

              </li>
             </ul>
        </div>
        @endforeach


        <div class="container">
            <!-- 登录与注册 -->
            <div class="header-grid">
                <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s" style="float:right;">
                    @php
                    $res = DB::table('shop_user')->where('id',session('user')) ->first();
                    @endphp
                    @if(!session('user'))
                    <ul>
                        <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="/home/login">登录</a></li>
                        <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="/home/regist">注册</a></li>
                    </ul>
                    @else
                    <div>
                        欢迎您 , {{$res->username}}
                        <a href="/home/personal" style="color:#333">个人中心</a>
                        <a href="/home/mylist" style="color:#333">我的订单</a>
                        <a href="/home/favorites" style="color:#333">我的收藏</a>
                        <a href="/home/dologout" style="color:#333">退出</a>
                    </div>
                    @endif
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="logo-nav">
                <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                    <h1><a href="/">淘 鞋 吧<span></span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="" class="act">Home</a></li>
                            <!-- Mega Menu -->
                            @php
                                $res = DB::table('shop_category')->get();
                            @endphp
                            @foreach ($res as $v)
                            <li class="dropdown">
                                @if ($v->pid == 0)
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$v->cate_name}} <b class="caret"></b></a>
                                @endif
                                <ul class="dropdown-menu multi-column columns-2">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="multi-column-dropdown">
                                                @foreach ($res as $val)
                                                    @if ($val->pid == $v->id)
                                                        <li><a href="products.html"> &nbsp; &nbsp; &nbsp;{{$val->cate_name}}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    </nav>
                </div>
                <div class="logo-nav-right">
                        <!-- search-scripts -->
                        <script src="/homes/js/classie.js"></script>
                        <script src="/homes/js/uisearch.js"></script>
                            <script>
                                new UISearch( document.getElementById( 'sb-search' ) );
                            </script>
                        <!-- //search-scripts -->
                </div>
                <div class="header-right">
                    <div class="cart box_1">
                        <a href="/home/cart">
                            <h3> <div class="total">
                                <img src="/homes/images/bag.png" style="width:30px;" alt="" />
                            </h3>
                        </a>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<!-- //header -->
    @section('content')



    @show

<!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
                    <h3>关于我们</h3>
                    <p><span>多 ---- 品类齐全</span><span>快 ---- 极速配送</span><span>好 ---- 正品行货</span><span>省 ---- 天天低价</span></p>
                </div>
                <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
                    <h3>特色服务</h3>
                    <p><span>淘鞋Q卡</span><span>保障服务</span><span>淘鞋社区</span></p>
                </div>
                <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
                    <h3>联系方式</h3>
                    <ul>
                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>北京市 &nbsp; 昌平区<span>XDL</span></li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>97693650@qq.com</li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+177 1314 8904</li>
                    </ul>
                </div>
                @php

                    $links = DB::table('shop_links')->get();
                @endphp
                <!-- 十二个小图组合成一张大图的logo -->
                <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
                    <h3>友情链接</h3>
                    @foreach($links as $kl => $vl)
                    <div class="footer-grid-left">
                        <a href="{{$vl->url}}"><img src="{{$vl->logo}}" alt=" " title="{{$vl->title}}" class="img-responsive"  width="40px" height="40px" /></a>
                    </div>
                    @endforeach

                    <div class="clearfix"> </div>
                </div>

                <div class="clearfix"> </div>
            </div>

            <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
                <h2><a href="/">淘 鞋 吧</a></h2>
            </div>
        </div>
    </div>
<!-- //footer -->

    @section('js')



    @show
</body>
</html>