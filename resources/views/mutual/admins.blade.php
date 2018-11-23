<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link rel="stylesheet" href="/admins/css/style.css">
    <link rel="stylesheet" href="/admins/css/loader-style.css">
    <link rel="stylesheet" href="/admins/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/admins/js/progress-bar/number-pb.css">
    <style type="text/css">
        canvas#canvas4 {
            position: relative;
            top: 20px;
        }
    </style>
    <link rel="shortcut icon" href="/admins/ico/minus.png">
</head>
    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- TOP NAVBAR -->
        <nav role="navigation" class="navbar navbar-static-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="entypo-menu"></span>
                    </button>
                    <button class="navbar-toggle toggle-menu-mobile toggle-left" type="button">
                        <span class="entypo-list-add"></span>
                    </button>
                    <div id="logo-mobile" class="visible-xs">
                       <h1>WEB管理<span>v1.2</span></h1>
                    </div>
                </div>
                <div id="nt-title-container" class="navbar-left running-text visible-lg">
                    <ul class="date-top">
                        <li class="entypo-calendar" style="margin-right:5px"></li>
                        <li id="Date"></li>
                    </ul>
                    <ul id="digital-clock" class="digital">
                        <li class="entypo-clock" style="margin-right:5px"></li>
                        <li class="hour"></li>
                        <li>:</li>
                        <li class="min"></li>
                        <li>:</li>
                        <li class="sec"></li>
                        <li class="meridiem"></li>
                    </ul>
                    <ul id="nt-title">
                        <li><i class="wi-day-lightning"></i>&#160;&#160;Berlin&#160;
                            <b>85</b><i class="wi-fahrenheit"></i>&#160;; 15km/h
                        </li>
                    </ul>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">

                    <ul style="margin-right:0;" class="nav navbar-nav navbar-right">
                        <li>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" class="admin-pic img-circle" src="http://api.randomuser.me/portraits/thumb/men/10.jpg">Hi, Dave Mattew <b class="caret"></b>
                            </a>
                            <ul style="margin-top:14px;" role="menu" class="dropdown-setting dropdown-menu">
                                <li>
                                    <a href="#">
                                        <span class="entypo-user"></span>&#160;&#160;My Profile</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="entypo-vcard"></span>&#160;&#160;Account Setting</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="entypo-lifebuoy"></span>&#160;&#160;Help</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="http://themeforest.net/item/apricot-navigation-admin-dashboard-template/7664475?WT.ac=category_item&WT.z_author=themesmile">
                                        <span class="entypo-basket"></span>&#160;&#160; Purchase</a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a class="toggle-left" href="#">
                                <span style="font-size:20px;" class="entypo-list-add"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /END OF TOP NAVBAR -->
        <!-- SIDE MENU -->
        <div id="skin-select">
            <div id="logo">
             <h1>CloudSoft<span>v1.2</span></h1>
            </div>
            <a id="toggle">
                <span class="entypo-menu"></span>
            </a>
            <div class="search-hover">
                <form id="demo-2">
                    <input type="search" placeholder="Search Menu..." class="id_search">
                </form>
            </div>
            <div class="skin-part">
                <div id="tree-wrap">
                    <div class="side-bar">
                        <ul class="topnav menu-left-nest">
                            <li>
                                <a href="#" style="border-left:0px solid!important;" class="title-menu-left">

                                    <span class="widget-menu"></span>
                                    <i data-toggle="tooltip" class="entypo-cog pull-right config-wrap"></i>

                                </a>
                            </li>
                            <li>
                                <a class="tooltip-tip ajax-load" href="#" title="Blog App">
                                    <i class="icon-document-edit"></i>
                                    <span>Blog App</span>
                                </a>
                                <ul>
                                    <li>
                                        <a class="tooltip-tip2 ajax-load" href="blog-list.html" title="Blog List"><i class="entypo-doc-text"></i><span>Blog List</span></a>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip2 ajax-load" href="blog-detail.html" title="Blog Detail"><i class="entypo-newspaper"></i><span>Blog Details</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF SIDE MENU -->
        <!--  PAPER WRAP -->
        <div class="wrap-fluid">
            <div class="container-fluid paper-wrap bevel tlbr">
                <!-- CONTENT -->
                <!--TITLE -->
                <div class="row">
                    <div id="paper-top">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-7">
                            <div class="devider-vertical visible-lg"></div>
                            <div class="tittle-middle-header">
                                <div class="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <span class="tittle-alert entypo-info-circled"></span>
                                    Welcome back,&nbsp;
                                    <strong>Dave mattew!</strong>&nbsp;&nbsp;Your last sig in at Yesterday, 16:54 PM
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ TITLE -->
                <!-- BREADCRUMB -->
                <ul id="breadcrumb">
                    <li>
                        <span class="entypo-home"></span>
                    </li>
                    <li><i class="fa fa-lg fa-angle-right"></i>
                    </li>
                    <li><a href="#" title="Sample page 1">Home</a>
                    </li>
                    <li><i class="fa fa-lg fa-angle-right"></i>
                    </li>
                    <li><a href="#" title="Sample page 1">Dashboard</a>
                    </li>
                </ul>
                <!-- END OF BREADCRUMB -->
                <!-- 内容 -->
                <div class="content-wrap">
                @section('content')



                @show

                </div>
            </div>
        </div>
        <!-- END OF RIGHT SLIDER CONTENT-->
        <script type="text/javascript" src="/admins/js/jquery.js"></script>
        <script src="/admins/js/progress-bar/src/jquery.velocity.min.js"></script>
        <script src="/admins/js/progress-bar/number-pb.js"></script>
        <script src="/admins/js/progress-bar/progress-app.js"></script>
        <!-- MAIN EFFECT -->
        <script type="text/javascript" src="/admins/js/preloader.js"></script>
        <script type="text/javascript" src="/admins/js/bootstrap.js"></script>
        <script type="text/javascript" src="/admins/js/app.js"></script>
        <script type="text/javascript" src="/admins/js/load.js"></script>
        <script type="text/javascript" src="/admins/js/main.js"></script>
        <!-- GAGE -->
        <script type="text/javascript" src="/admins/js/chart/jquery.flot.js"></script>
        <script type="text/javascript" src="/admins/js/chart/jquery.flot.resize.js"></script>
        <!-- <script type="text/javascript" src="/admins/js/chart/realTime.js"></script> -->
        <script type="text/javascript" src="/admins/js/speed/canvasgauge-coustom.js"></script>
        <script type="text/javascript" src="/admins/js/countdown/jquery.countdown.js"></script>
        <script src="/admins/js/jhere-custom.js"></script>
        <script>
            var gauge4 = new Gauge("canvas4", {
                'mode': 'needle',
                'range': {
                    'min': 0,
                    'max': 90
                }
            });
            gauge4.draw(Math.floor(Math.random() * 90));
            var run = setInterval(function() {
                gauge4.draw(Math.floor(Math.random() * 90));
            }, 3500);
        </script>
        <script type="text/javascript">
            /* Javascript
             *
             * See http://jhere.net/docs.html for full documentation
             */
            $(window).on('load', function() {
                $('#mapContainer').jHERE({
                    center: [52.500556, 13.398889],
                    type: 'smart',
                    zoom: 10
                }).jHERE('marker', [52.500556, 13.338889], {
                    icon: 'admins/img/marker.png',
                    anchor: {
                        x: 12,
                        y: 32
                    },
                    click: function() {
                        alert('Hallo from Berlin!');
                    }
                })
                    .jHERE('route', [52.711, 13.011], [52.514, 13.453], {
                        color: '#FFA200',
                        marker: {
                            fill: '#86c440',
                            text: '#'
                        }
                    });
            });
        </script>
        <script type="text/javascript">
            var output, started, duration, desired;

            // Constants
            duration = 5000;
            desired = '50';

            // Initial setup
            output = $('#speed');
            started = new Date().getTime();

            // Animate!
            animationTimer = setInterval(function() {
                // If the value is what we want, stop animating
                // or if the duration has been exceeded, stop animating
                if (output.text().trim() === desired || new Date().getTime() - started > duration) {
                    console.log('animating');
                    // Generate a random string to use for the next animation step
                    output.text('' + Math.floor(Math.random() * 60)

                    );

                } else {
                    console.log('animating');
                    // Generate a random string to use for the next animation step
                    output.text('' + Math.floor(Math.random() * 120)

                    );
                }
            }, 5000);
        </script>
        <script type="text/javascript">
            $('#getting-started').countdown('2015/01/01', function(event) {
                $(this).html(event.strftime(

                    '<span>%M</span>' + '<span class="start-min">:</span>' + '<span class="start-min">%S</span>'));
            });
        </script>


        @section('js')


        @show
    </body>
</html>
