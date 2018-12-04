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
  <title>页面消失了......</title>
  <link rel="stylesheet" href="/admins/admins/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/animate.css/animate.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/metisMenu/dist/metisMenu.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/Waves/dist/waves.min.css">
  <link rel="stylesheet" href="/admins/admins/bower_components/toastr/toastr.css">
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

<body class="user-page">
  <!--Preloader-->
<div id="preloader">
      <div class="refresh-preloader"><div class="preloader"><i>.</i><i>.</i><i>.</i></div></div>
</div>
    <div class="wrapper">
        <div class="bg error-404"></div>
        <div class="overlay"></div>
        <div class="table-wrapper text-center">
            <div class="table-row">
                <div class="table-cell">
                    <div class="pagenotfound">
                        <h4 class="text-center">404</h4>
                            <p class="f-16 white"><i class="zmdi zmdi-info-outline f-20 m-r-10"></i>网 页 出 错 了 , 程 序 员 小 哥 正 在 加 班 加 点 的 检 查 ! ! !</p>
                              <br>
                              <br>
                              <br>
                            <a class="white f-16" href="/"><u>回到首页</u></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="/admins/admins/bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $('#preloader').height($(window).height() + "px");
  $(window).on('load', function(){
      setTimeout(function(){
          $('body').css("overflow-y","visible");
          $('#preloader').fadeOut(400);
      }, 800);
  });
</script>
</body>
</html>
