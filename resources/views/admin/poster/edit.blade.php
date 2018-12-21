@extends('mutual.admins')

@section('title',$title)

@section('content')

 <style>
.col-center-block {
    float: none;
    display: block;
    margin-left: auto;
    margin-right: auto;
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

            <form action="/admin/poster/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>

            <div class="col-md-6 col-center-block">
                    <div class="content-box">
                        <div class="head info-bg clearfix">
                            <h5 class="content-title pull-left">
                                {{$title}}
                            </h5>

                        </div>
                        <div class="content">
                            <div class="form-group">
                                <label class="control-label info-color">
                                    商家名
                                </label>
                                <input type="text" class="form-control input-info" name="postername" value="{{$res->postername}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    标题
                                </label>
                                <input type="text" class="form-control input-info" name="title" value="{{$res->title}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    背景色
                                </label>
                                <input type="text" class="form-control input-info" name="bgcolor" value="{{$res->bgcolor}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    链接地址
                                </label>
                                <input type="url" class="form-control input-info" name="url" value="{{$res->url}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    广告图
                                </label>
                                </div>
                            <div class="content-box">

                                <div class="content border:1px">
                                    <img src="{{$res->pics}}" id='imgs' alt="上传后显示图片" width="300">
                                    <input id='file_upload' type="file" name="pics" style="" value="">
                                </div>
                            </div>


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

@section('js');

<style>

$('.mws-form-message').delay(2000).fadeOut(2000);

</style>

@stop