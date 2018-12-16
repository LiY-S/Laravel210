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


            <form action="/admin/links/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
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
                                    标题
                                </label>
                                <input type="text" class="form-control input-info" name="title" value="{{$res->title}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    网址
                                </label>
                                <input type="url" class="form-control input-info" name="url" value="{{$res->url}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    描述
                                </label>
                                <input type="text" class="form-control input-info" name="desc" value="{{$res->desc}}">
                            </div>

                            <div class="content-box">
                                <div class="head clearfix font-fa:12px  info-color" style="font-size:17px">
                                    <!-- <h5 class="content-title pull-left">
                                        请选择图像
                                    </h5> -->
                                    logo

                                </div>
                                <div class="content border:1px">
                                    <input type="file" class="dropify" name="logo" value="$res->logo">
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



@section('js')

<script>

    $('.mws-form-message').delay(2000).fadeOut(2000);

</script>

@stop


