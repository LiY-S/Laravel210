@extends('mutual.admins')

@section('title',$title)

@section('content')

<script type="text/javascript" src=" /admins/zhuye/js/jquery.js">
</script>
<script type="text/javascript" src="/admins/zhuye/js/indexs.js">
</script>
<link rel="stylesheet" href="/admins/zhuye/css/1.css">
<link rel="stylesheet" type="text/css" href="/admins/zhuye/css/style.css">



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


@stop

