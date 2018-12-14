<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no" />
  <meta name="theme-color" content="#49CEFF">
  <meta name="msapplication-navbutton-color" content="#49CEFF" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/admins/admins/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/animate.css/animate.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/metisMenu/dist/metisMenu.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/Waves/dist/waves.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/toastr/toastr.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/datatables/media/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="/admins/admins/css/style.css">

</head>
<body>
  <!--Preloader-->
	<div id="preloader">
        <div class="refresh-preloader"><div class="preloader"><i>.</i><i>.</i><i>.</i></div></div>
	</div>
<div class="wrapper">
	<nav class="navbar">
		<div class="navbar-header container">
			<a href="#" class="menu-toggle">
				<i class="zmdi zmdi-menu">
				</i>
			</a>
			<!-- logo图片 -->
			<a href="/admin" class="logo">
				后台首页
			</a>
			<a href="/admin" class="icon-logo">
			</a>
		</div>
		<div class="navbar-container clearfix">
			<!-- logo -->
			<div class="pull-left" style="margin-left: 30px;">
				<a href="/" class="page-title text-uppercase">
					商城首页
				</a>
			</div>
			<div class="pull-right">
				@php

                $res = DB::table('shop_admin')-> where('id',session('uid'))-> first();

                @endphp
				<div class="pull-right">
					<div class="pull-left search-container searchbox" style="width: 150px; margin-top: 30px;font-size: 22px;">
						嘿&nbsp;,&nbsp;&nbsp;&nbsp; {{$res->username}}
					</div>
					<ul class="nav pull-right right-menu">
						<li class="">
							<a class="" data-toggle="dropdown" aria-expanded="true">
								<!-- <i class="zmdi zmdi-account-circle"> -->
								<img class="zmdi zmdi-account-circle" src="{{$res->profile}}" style="width: 45px;height:40px;border-radius: 50%">
								<!-- </i> -->
							</a>
							<div class="more-opt-container dropdown-menu">
								<a href="/admin/profile"><i class="zmdi zmdi-account-o"></i>修改头像</a>
								<a href="/admin/passchange"><i class="zmdi zmdi-storage"></i>修改密码</a>
								<a href="/admin/logout"><i class="zmdi zmdi-run"></i>退出</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
	</nav>
	<aside class="sidebar">
		<ul class="nav metismenu">
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>管理员管理<span class="zmdi arrow"></span></a>
				<ul class="nav nav-inside collapse">
					<li class="inside-title">管理员管理</li>
					<li><a href="/admin/user/create">添加管理员</a></li>
					<li><a href="/admin/user">浏览管理员</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>用户管理<span class="zmdi arrow"></span></a>
				<ul class="nav nav-inside collapse">
					<li class="inside-title ">用户管理</li>
					<li><a href="/admin/users">浏览用户</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>轮播图管理<span class="zmdi arrow"></span></a>
				<ul class="nav nav-inside collapse">
					<li class="inside-title">轮播图管理</li>
					<li><a href="/admin/rotation/create">添加轮播图</a></li>
					<li><a href="/admin/rotation">浏览轮播图</a></li>
				</ul>
			</li>
            <li>
                <a href="#"><i class="zmdi zmdi-view-dashboard"></i>分类管理<span class="zmdi arrow"></span></a>
                <ul class="nav nav-inside collapse">
                  <li class="inside-title">分类管理</li>
                  <li><a href="/admins/cate/create">添加分类</a></li>
                  <li><a href="/admins/cate">浏览分类</a></li>
                </ul>
            </li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>商品管理<span class="zmdi arrow"></span></a>
				<ul class="nav nav-inside collapse">
					<li class="inside-title">商品管理</li>
					<li><a href="/admins/goods/create">商品添加</a></li>
                    <li><a href="/admins/goods">浏览商品</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>收藏管理<span class="zmdi arrow"></span></a>
				<ul class="nav metismenu">
					<li class="inside-title">收藏管理</li>
					<li><a href="/admin/collect/index">浏览收藏</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>订单管理<span class="zmdi arrow"></span></a>
				<ul class="nav nav-inside collapse">
					<li class="inside-title">订单管理</li>
					<li><a href="/admin/order">浏览订单</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>角色管理<span class="zmdi arrow"></span></a>
				<ul class="nav nav-inside collapse">
					<li class="inside-title">角色管理</li>
					<li><a href="/admin/role/create">添加角色</a></li>
					<li><a href="/admin/role">浏览角色</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>权限管理<span class="zmdi arrow"></span></a>
				<ul class="nav metismenu">
					<li class="inside-title">权限管理</li>
					<li><a href="/admin/permission/create">添加权限</a></li>
					<li><a href="/admin/permission">浏览权限</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>公告管理<span class="zmdi arrow"></span></a>
				<ul class="nav nav-inside collapse">
					<li class="inside-title">公告管理</li>
					<li><a href="/admin/notice/create">添加公告</a></li>
					<li><a href="/admin/notice">浏览公告</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-view-dashboard"></i>友情链接<span class="zmdi arrow"></span></a>
				<ul class="nav nav-inside collapse"><li class="inside-title">友情链接</li>
					<li><a href="/admin/links/create">添加链接</a></li>
					<li><a href="/admin/links">浏览链接</a></li>
				</ul>
			</li>
		</ul>
	</aside>
	<div class="row">
		<div class="col-lg-12">
			<div class="content-box">
				<div class="content">
					@section('content')



					@show
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
        <script src="/admins/admins/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/admins/admins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/admins/admins/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <script src="/admins/admins/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js"></script>
        <script src="/admins/admins/bower_components/Waves/dist/waves.min.js"></script>
        <script src="/admins/admins/bower_components/toastr/toastr.js"></script>
        <script src="/admins/admins/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="/admins/admins/bower_components/datatables.net-responsive/js/dataTables.responsive.js"></script>
        <script src="/admins/admins/bower_components/moment/min/moment.min.js"></script>
        <script src="/admins/admins/bower_components/Chart.js/Chart.js"></script>
        <script src="/admins/admins/bower_components/flot/jquery.flot.js"></script>
        <script src="/admins/admins/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="/admins/admins/bower_components/flot.tooltip/js/jquery.flot.tooltip.js"></script>
        <script src="/admins/admins/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
        <script src="/admins/admins/js/common.js"></script>
        <script>
            var randomScalingFactor = function() {
                return Math.round(Math.random() * 100)
            };
            var lineChartData = {
                labels: ["MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY", "SUNDAY"],
                datasets: [{
                    label: "Mens goods",
                    fillColor: "rgba(73, 206, 255, 0.5)",
                    strokeColor: "rgba(73, 206, 255, 0.7)",
                    pointColor: "rgba(73, 206, 255, 0.9)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "rgba(255, 193, 7, 1)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                },
                {
                    label: "Women goods",
                    fillColor: "rgba(255, 187, 51, 0.5)",
                    strokeColor: "rgba(255, 187, 51, 0.7)",
                    pointColor: "rgba(255, 187, 51, 0.9)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "rgba(244, 67, 54, 1)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                },
                {
                    label: "Children goods",
                    fillColor: "rgba(153, 204, 0, 0.5)",
                    strokeColor: "rgba(153, 204, 0, 0.7)",
                    pointColor: "rgba(153, 204, 0, 0.9)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "rgba(33, 150, 243, 1)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                }]
            }
        </script>
        <script>
            $(function() {
                /* Make some random data for the Chart*/

                var d1 = [];
                for (var i = 0; i <= 10; i += 1) {
                    d1.push([i, parseInt(Math.random() * 100)]);
                }
                var d2 = [];
                for (var i = 0; i <= 10; i += 1) {
                    d2.push([i, parseInt(Math.random() * 100)]);
                }

                var d3 = [];
                for (var i = 0; i <= 10; i += 1) {
                    d3.push([i, parseInt(Math.random() * 100)]);
                }

                var d4 = [];
                for (var i = 0; i <= 50; i += 1) {
                    d4.push([i, parseInt(Math.random() * 100)]);
                }

                /* Chart Options */

                var options = {
                    series: {
                        shadowSize: 0,
                        label: "Qty",
                        lines: {
                            show: true,
                            lineWidth: 2
                        },
                        points: {
                            show: true
                        }
                    },
                    grid: {
                        margin: 10,
                        show: false,
                        hoverable: true,
                        clickable: true
                    },
                    yaxis: {
                        max: 100,
                        min: 0
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        show: true,
                        cssClass: "flot-tooltip",
                        defaultTheme: false,
                        content: '%y.2',
                        shifts: {
                            x: 1,
                            y: -45
                        }
                    }
                };

                var options2 = {
                    series: {
                        shadowSize: 5,
                        label: "Qty",
                        lines: {
                            show: true,
                            lineWidth: 2
                        }
                    },
                    grid: {
                        margin: 10,
                        show: false,
                        hoverable: true,
                        clickable: false
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        show: true,
                        cssClass: "flot-tooltip",
                        defaultTheme: false,
                        content: '%y.2',
                        shifts: {
                            x: 1,
                            y: -45
                        }
                    }
                };

                /* Let's create the chart */
                if ($("#line-chart-2")[0]) {
                    $.plot($("#line-chart-2"), [{
                        data: d2,
                        color: '#fff'
                    }], options);
                }

                if ($("#line-chart-3")[0]) {
                    $.plot($("#line-chart-3"), [{
                        data: d3,
                        color: '#fff'
                    }], options);
                }

                if ($("#line-chart-4")[0]) {
                    $.plot($("#line-chart-4"), [{
                        data: d4,
                        color: '#fff'
                    }], options2);
                }

            });
        </script>
<<<<<<< HEAD
         <div class="content">
			@section('content')
			<div class="boxs">
				<!-- 时钟开始 -->
				<div class="main_banner">
					<div class="main_banner_wrap">
						<canvas id="myCanvas" width="150" height="150">
						</canvas>
					</div>
				</div>
				<!-- 时钟结束 -->
				<!-- 配置开始 -->
				<div>
					<p>
						<i class="i a">
						</i>
						<b>
							当前域名:
						</b>
						<i id="xitong">
							<?php echo $_SERVER[ 'HTTP_HOST'] ;?>
						</i>
					</p>
					<br>
					<p>
						<i class="i b">
						</i>
						<b>
							当前服务器的操作系统：
						</b>
						<i id="netline">
							<?php echo $_SERVER[ "SystemRoot"]; ?>
						</i>
					</p>
					<br>
					<p>
						<i class="i b">
						</i>
						<b>
							服务器软件配置信息:
						</b>
						<i id="wangsu">
							<?php echo $_SERVER[ "SERVER_SOFTWARE"]; ?>
						</i>
					</p>
					<br>
					<p>
						<i class="i c">
						</i>
						<b>
							当前脚本所在的文档根目录:
						</b>
						<i id="fenbianlv">
							<?php echo $_SERVER[ "CONTEXT_DOCUMENT_ROOT"]; ?>
						</i>
					</p>
					<br>
					<p>
						<i class="i d">
						</i>
						<b>
							服务器使用的CGI规范的版本:
						</b>
						<i id="liulanqi">
							<?php echo $_SERVER[ "GATEWAY_INTERFACE"];?>
						</i>
					</p>
					<br>
					<p>
						<i class="i d">
						</i>
						<b>
							请求页面时通信协议的名称和版本:
						</b>
						<i id="liulanqi">
							<?php echo $_SERVER[ "SERVER_PROTOCOL"];?>
						</i>
					</p>
					<br>
					<p>
						<i class="i e">
						</i>
						<b>
						</b>
						<i id="flash_banben">
						</i>
					</p>
					<br>
				</div>
				<!-- 配置结束 -->
			</div>
			@show
		</div>
      </div>
    </div>
  </div>

</div>
        <script type="text/javascript" src=" /admins/zhuye/js/jquery.js">
        </script>
        <script type="text/javascript" src="/admins/zhuye/js/index.js">
        </script>
        </script>
        <script src="/admins/admins/bower_components/jquery/dist/jquery.min.js">
        </script>
        <script src="/admins/admins/bower_components/bootstrap/dist/js/bootstrap.min.js">
        </script>
        <script src="/admins/admins/bower_components/metisMenu/dist/metisMenu.min.js">
        </script>
        <script src="/admins/admins/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js">
        </script>
        <script src="/admins/admins/bower_components/Waves/dist/waves.min.js">
        </script>
        <script src="/admins/admins/bower_components/toastr/toastr.js">
        </script>
        <script src="/admins/admins/bower_components/datatables/media/js/jquery.dataTables.min.js">
        </script>
        <script src="/admins/admins/bower_components/datatables.net-responsive/js/dataTables.responsive.js">
        </script>
        <script src="/admins/admins/bower_components/moment/min/moment.min.js">
        </script>
        <script src="/admins/admins/bower_components/Chart.js/Chart.js">
        </script>
        <script src="/admins/admins/bower_components/flot/jquery.flot.js">
        </script>
        <script src="/admins/admins/bower_components/flot/jquery.flot.resize.js">
        </script>
        <script src="/admins/admins/bower_components/flot.tooltip/js/jquery.flot.tooltip.js">
        </script>
        <script src="/admins/admins/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js">
        </script>
        <script src="/admins/admins/js/common.js">
        </script>
        <script>
            var randomScalingFactor = function() {
                return Math.round(Math.random() * 100)
            };
            var lineChartData = {
                labels: ["MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY", "SUNDAY"],
                datasets: [{
                    label: "Mens goods",
                    fillColor: "rgba(73, 206, 255, 0.5)",
                    strokeColor: "rgba(73, 206, 255, 0.7)",
                    pointColor: "rgba(73, 206, 255, 0.9)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "rgba(255, 193, 7, 1)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                },
                {
                    label: "Women goods",
                    fillColor: "rgba(255, 187, 51, 0.5)",
                    strokeColor: "rgba(255, 187, 51, 0.7)",
                    pointColor: "rgba(255, 187, 51, 0.9)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "rgba(244, 67, 54, 1)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                },
                {
                    label: "Children goods",
                    fillColor: "rgba(153, 204, 0, 0.5)",
                    strokeColor: "rgba(153, 204, 0, 0.7)",
                    pointColor: "rgba(153, 204, 0, 0.9)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "rgba(33, 150, 243, 1)",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                }]
            }
        </script>
        <script>
            $(function() {
                /* Make some random data for the Chart*/

                var d1 = [];
                for (var i = 0; i <= 10; i += 1) {
                    d1.push([i, parseInt(Math.random() * 100)]);
                }
                var d2 = [];
                for (var i = 0; i <= 10; i += 1) {
                    d2.push([i, parseInt(Math.random() * 100)]);
                }

                var d3 = [];
                for (var i = 0; i <= 10; i += 1) {
                    d3.push([i, parseInt(Math.random() * 100)]);
                }

                var d4 = [];
                for (var i = 0; i <= 50; i += 1) {
                    d4.push([i, parseInt(Math.random() * 100)]);
                }

                /* Chart Options */

                var options = {
                    series: {
                        shadowSize: 0,
                        label: "Qty",
                        lines: {
                            show: true,
                            lineWidth: 2
                        },
                        points: {
                            show: true
                        }
                    },
                    grid: {
                        margin: 10,
                        show: false,
                        hoverable: true,
                        clickable: true
                    },
                    yaxis: {
                        max: 100,
                        min: 0
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        show: true,
                        cssClass: "flot-tooltip",
                        defaultTheme: false,
                        content: '%y.2',
                        shifts: {
                            x: 1,
                            y: -45
                        }
                    }
                };

                var options2 = {
                    series: {
                        shadowSize: 5,
                        label: "Qty",
                        lines: {
                            show: true,
                            lineWidth: 2
                        }
                    },
                    grid: {
                        margin: 10,
                        show: false,
                        hoverable: true,
                        clickable: false
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        show: true,
                        cssClass: "flot-tooltip",
                        defaultTheme: false,
                        content: '%y.2',
                        shifts: {
                            x: 1,
                            y: -45
                        }
                    }
                };

                /* Let's create the chart */
                if ($("#line-chart-2")[0]) {
                    $.plot($("#line-chart-2"), [{
                        data: d2,
                        color: '#fff'
                    }], options);
                }

                if ($("#line-chart-3")[0]) {
                    $.plot($("#line-chart-3"), [{
                        data: d3,
                        color: '#fff'
                    }], options);
                }

                if ($("#line-chart-4")[0]) {
                    $.plot($("#line-chart-4"), [{
                        data: d4,
                        color: '#fff'
                    }], options2);
                }

            });
        </script>
=======
>>>>>>> lys
        <script>
            $(function() {
                $('.easychart').easyPieChart({
                    barColor: "#F44336",
                    trackColor: '#cccccc',
                    size: 115,
                    lineWidth: 15,
                    scaleLength: 0
                });
            });
        </script>
        <script>
            $('#table2').DataTable({
                "dom": '<"toolbar tool2">rtip',
                info: false,
                paging: false,
                responsive: true,
            });

            $("div.tool2").css("padding", "7px 20px").html('<h5 class="content-title">Exchange rates</h5>');

            //Todo
            $(document).on('mouseover', '.list-group .checkbox',
            function() {
                $('.list-group input:checkbox').each(function() {
                    $(this).on("change",
                    function() {
                        if ($(this).is(":checked")) {
                            $(this).closest(".list-group-item").addClass("checked-todo").removeClass("list-item");
                        } else {
                            $(this).closest(".list-group-item").removeClass("checked-todo");
                        }
                    });
                });
            });

            $(document).on('click', '.trash',
            function(e) {
                var clearedCompItem = $(this).closest(".list-group-item").remove();
                e.preventDefault();
            });

            //Social widget
            $('.socials span').on('click',
            function() {
                $(this).toggleClass("half-opacity");
            });
        </script>
<<<<<<< HEAD
        @section('js') @show
=======
        @section('js')


        @show
>>>>>>> lys
    </body>

</html>