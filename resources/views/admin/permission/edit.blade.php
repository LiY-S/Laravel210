@extends('mutual.admins')

@section('title',$title)

@section('content')


<div class="col-md-6 col-md-offset-3" style="float: none;height: 740px">
    <div class="mws-panel-body no-padding">
         @if (session('error'))
        <div class="mws-form-message error">
            <ul>
                <li class="error"style="background-color: #ef9a9a;list-style:none;font-size: 20px">{{session('error')}}</li>
            </ul>
        </div>
        @endif
        <form action="/admin/permission/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
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
                        权限路径名
                        <hr>
                        <input type="text" class="form-control" name='url_name'value="{{$res->url_name}}">
                    </div>
                   <div class="form-group">
                        权限路径
                        <hr>
                        <input type="text" class="form-control" name='url'value="{{$res->url}}">
                    </div>
                </div>
            </div>
             {{csrf_field()}}
             {{method_field('PUT')}}
            <button type="submit" class="btn btn-info">
                修改
            </button>
        </form>
    </div>
</div>

@stop

 @section('js')
<script>

        $('.error').delay(2000).slideUp(2000);

</script>
@stop