@extends('mutual.admins')

@section('title',$title)

@section('content')

<style>

.col-center-block {
    float: none;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

</style>

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span></span>
        </div>
        <div class="mws-panel-body no-padding">

            @if (count($errors) > 0)
            <div class="mws-form-message error">
                显示错误信息
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style='font-size:14px'>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <form action="/admin/links" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="col-md-6 col-center-block">
                    <div class="content-box">
                        <div class="head info-bg clearfix">
                            <h5 class="content-title pull-left">
                                {{$title}}
                            </h5>
                            <div class="functions-btns pull-right">
                                <a class="refresh-btn" href="#">
                                    <i class="zmdi zmdi-refresh">
                                    </i>
                                </a>
                                <a class="fullscreen-btn" href="#">
                                    <i class="zmdi zmdi-fullscreen">
                                    </i>
                                </a>
                                <a class="close-btn" href="#">
                                    <i class="zmdi zmdi-close">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <div class="form-group">
                                <label class="control-label info-color">
                                    标题
                                </label>
                                <input type="text" class="form-control input-info" name="title">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    网址
                                </label>
                                <input type="url" class="form-control input-info" name="url">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    描述
                                </label>
                                <input type="text" class="form-control input-info" name="desc">
                            </div>

                            <div class="content-box">
                                <div class="head clearfix font-fa:12px  info-color" style="font-size:17px">
                                    <!-- <h5 class="content-title pull-left">
                                        请选择图像
                                    </h5> -->
                                    logo

                                </div>
                                <div class="content border:1px">
                                    <input type="file" class="dropify" name="logo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    状态
                                </label>
                                    <ul class="info-color inline" style="list-style:none;">
                                        <li style="display: inline; float:left;margin-right:20px"><label><input type="radio" name='status' value="1" checked>开启</label></li>
                                        <li><label><input type="radio" name='status' value="0" style='display:inline'>禁用</label></li>
                                    </ul>
                            </div>

                            <div class="mws-button-row">
                                {{csrf_field()}}

                                 <button type="submit" class="btn btn-info">添加</button>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop



@section('js')

<script>

    $('.mws-form-message').delay(2000).fadeOut(2000);

</script>

@stop
