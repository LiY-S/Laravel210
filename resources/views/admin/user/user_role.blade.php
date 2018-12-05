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

.mws-form-list{
    list-style:none;
    float:none;
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

            <form action="/admin/do_user_role?id={{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
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
                                    用户名
                                </label>
                                <input type="text" class="form-control input-info" name="username" value="{{$res->username}}">
                            </div>

                        <div class="mws-form-row">
                        <label class="mws-form-label info-color">角色名</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                    @foreach($roles as $k => $v)
                                        @if(in_array($v->id,$info))
                                            <li>
                                                <label><input type="checkbox" name='role_id[]' value='{{$v->id}}' checked>{{$v->role_name}}</label>
                                            </li>
                                            @else
                                            <li>
                                                <label><input type="checkbox" name='role_id[]' value='{{$v->id}}'>{{$v->role_name}}</label>
                                            </li>
                                        @endif
                                    @endforeach
                            </ul>
                        </div>


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

