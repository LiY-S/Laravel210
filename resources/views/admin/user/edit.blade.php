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


            <form action="/admin/user/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
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
                                    用户名
                                </label>
                                <input type="text" class="form-control input-info" name="username" value="{{$res->username}}">
                            </div>

                            <div class="head clearfix font-fa:12px  info-color" style="font-size:17px">
                                    请选择图像
                                </div>
                            <!-- <div class="content-box"> -->

                                <div class="content border:1px">
                                    <img src="{{$res->profile}}" alt="">
                                    <input type="file" class="dropify" data-default-file="{{$res->profile}}" name="profile" style="">
                                </div>
                            <!-- </div> -->

                            <div class="form-group">
                                <label class="control-label info-color">
                                    状态
                                </label>
                                    <ul class="info-color inline" style="list-style:none;">
                                        <li style="display: inline; float:left;margin-right:20px"><label><input type="radio" name='status' value="1"  @if($res->status== 1) checked @endif>开启</label></li>
                                        <li><label><input type="radio" name='status' value="0" style='display:inline' @if($res->status== 0) checked @endif>禁用</label></li>
                                    </ul>
                            </div>

                            <!-- <div class="form-group">
                                <label class="control-label info-color">
                                    状态
                                </label>
                                    <ul class="info-color inline" style="list-style:none;">
                                        <li float:left;margin-right:20px"><label><input type="radio" name='status' value="1" @if($res->status== 1) checked @endif>开启</label></li>
                                        <li><label><input type="radio" name='status' value="0" style='display:inline' @if($res->status== 0) checked @endif>禁用</label></li>
                                    </ul>
                            </div> -->

                            <div class="mws-button-row">
                                {{csrf_field()}}

                                {{method_field('PUT')}}
                                 <button type="submit" class="btn btn-info">修改</button>

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

