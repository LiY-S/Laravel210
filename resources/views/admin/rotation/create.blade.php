@extends('mutual.admins')

@section('title',$title)

@section('content')




<div class="col-md-6 col-md-offset-3" style="float: none;height: 100%">
    <div class="mws-panel-body no-padding">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade in" role="alert" id="divs">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('error')}}</strong>
            </div>
        @endif
        <form action="/admin/rotation" method="post" class="mws-form" enctype='multipart/form-data'>
            <div class="content-box">
                <div class="head info-bg clearfix">
                    <h5 class="content-title pull-left">
                        {{$title}}
                    </h5>
                    <div class="functions-btns pull-right">
                    </div>
                </div>
                <div class="content">
                    <div class="form-group">
                        轮播图名称
                        <hr>
                        <input type="text" class="form-control" name='ad_name'>
                    </div>
                    <div class="form-group">
                        排序
                        <hr>
                        <input type="text" class="form-control" name='ad_sort'>
                    </div>
                    <div class="form-group">
                        图片地址
                        <hr>
                        <input type="text" class="form-control" name='ad_a'>
                    </div>
                    <div class="content">
                        轮播图图片
                        <hr>
                        <input id="file_upload" type="file" class="dropify" name='ad_src'>
                    </div>

                </div>
            </div>
             {{csrf_field()}}
            <button type="submit" class="btn btn-info">
                提交
            </button>
        </form>
    </div>
</div>


@stop

@section('js')
<script>

        $('.alert-dismissible').delay(2000).slideUp(2000);



</script>
@stop