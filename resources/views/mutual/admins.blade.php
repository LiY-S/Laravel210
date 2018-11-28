<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no" />
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#49CEFF">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#49CEFF" />
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="/admins/admins/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/animate.css/animate.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/metisMenu/dist/metisMenu.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/Waves/dist/waves.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/toastr/toastr.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/datatables/media/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="/admins/admins/css/style.css">
<!--
  <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
-->
    <!--[if lt IE 9]>
      <script src="/admins/admins/bower_components/html5shiv/dist/html5shiv.min,js"></script>
      <script src="/admins/admins/bower_components/respondJs/dest/respond.min.js"></script>
    <![endif]-->
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
          <i class="zmdi zmdi-menu"></i>
        </a>
        <!-- logo图片 -->
        <a href="/admin" class="logo">
            <img src="/admins/admins/img/logo.png" alt="Logo Pacificonis" />
        </a>
        <a href="/admin" class="icon-logo"></a>
    </div>
    <div class="navbar-container clearfix">
        <!-- logo -->
        <div class="pull-left">
            <a href="#" class="page-title text-uppercase">aaaa</a>
        </div>
        <div class="pull-right">
            <div class="pull-left search-container">
                <form class="searchbox">
                    <input type="search" placeholder="Search" name="search" class="searchbox-input" />
                    <input type="submit" class="searchbox-submit" value="" />
                    <span class="searchbox-icon">
                        <span class="zmdi zmdi-search search-icon"></span>
                    </span>
                </form>
            </div>
            <ul class="nav pull-right right-menu">
                <li class="more-options dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="zmdi zmdi-account-circle"></i>
                    </a>
                    <div class="more-opt-container dropdown-menu">
                        <a href="#"><i class="zmdi zmdi-account-o"></i>账户</a>
                        <a href="#"><i class="zmdi zmdi-storage"></i>存储</a>
                        <a href="#"><i class="zmdi zmdi-run"></i>退出</a>
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
          <li class="inside-title">Dashboard</li>
          <li><a href="/admin/user/create">添加用户</a></li>
          <li><a href="/admin/user">浏览用户</a></li>
          <li><a href="dashboard-3.html">Dashboard v3</a></li>
          <li><a href="dashboard-4.html">Dashboard v4</a></li>
        </ul>
      </li>
      <li>
        <a href="starter-page.html"><i class="zmdi zmdi-copy"></i>Starter Page</a>
      </li>
    </ul>
  </aside>
  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="#">Dashboard</a></li>
        <li class="active">Dashboard v1</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="content-box">
        <div class="head head-with-btns clearfix">
          <div class="functions-btns pull-right">
            <button type="button" class="btn btn-info">
             Week
            </button>
            <button type="button" class="btn btn-warning">
             Month
            </button>
            <button type="button" class="btn btn-warning">
             Year
            </button>
          </div>
        </div>
         <div class="content">
            @section('content')



            @show
         </div>
      </div>
    </div>
  </div>
</div>
    <!-- <footer class="page-footer">Copyright &copy; 2018.Company name All rights reserved.<a target="_blank" href="http://www.17sucai.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></footer> -->
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
  <script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
        labels : ["MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY","SUNDAY"],
        datasets : [
            {
                label: "Mens goods",
                fillColor : "rgba(73, 206, 255, 0.5)",
                strokeColor : "rgba(73, 206, 255, 0.7)",
                pointColor : "rgba(73, 206, 255, 0.9)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "rgba(255, 193, 7, 1)",
                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            },
            {
                label: "Women goods",
                fillColor : "rgba(255, 187, 51, 0.5)",
                strokeColor : "rgba(255, 187, 51, 0.7)",
                pointColor : "rgba(255, 187, 51, 0.9)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "rgba(244, 67, 54, 1)",
                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            },
            {
                label: "Children goods",
                fillColor : "rgba(153, 204, 0, 0.5)",
                strokeColor : "rgba(153, 204, 0, 0.7)",
                pointColor : "rgba(153, 204, 0, 0.9)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "rgba(33, 150, 243, 1)",
                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            }
        ]

    }
  </script>
  <script>
    $(function () {
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
            $.plot($("#line-chart-2"), [
                {data: d2, color: '#fff' }
            ], options);
        }

        if ($("#line-chart-3")[0]) {
            $.plot($("#line-chart-3"), [
                {data: d3, color: '#fff' }
            ], options);
        }

        if ($("#line-chart-4")[0]) {
            $.plot($("#line-chart-4"), [
                {data: d4, color: '#fff' }
            ], options2);
        }

    });
  </script>
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
      $(document).on('mouseover', '.list-group .checkbox', function () {
        $('.list-group input:checkbox').each(function () {
          $(this).on("change", function () {
            if ($(this).is(":checked")) {
              $(this).closest(".list-group-item").addClass("checked-todo").removeClass("list-item");
            } else {
              $(this).closest(".list-group-item").removeClass("checked-todo");
            }
          });
        });
      });

      $(document).on('click', '.trash', function (e) {
        var clearedCompItem = $(this).closest(".list-group-item").remove();
        e.preventDefault();
      });

      //Social widget
      $('.socials span').on('click', function() {
          $(this).toggleClass("half-opacity");
      });
  </script>
  <script src="/admins/admins/js/common.js"></script>
  @section('js')



  @show
</body>
</html>
