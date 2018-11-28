@extends('mutual.admins')

@section('title',$title)

@section('content')


<div class="col-md-6 col-md-offset-3" style="float: none;height: 740px">
    <div class="mws-panel-body no-padding">
        @if (count($errors) > 0)
        <div class="mws-form-message error">
            显示错误信息
            <ul>
                @foreach ($errors->all() as $error)
                <li style='font-size:14px'>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/admin/role" method="post" class="mws-form" enctype='multipart/form-data'>
            <div class="content-box">
                <div class="head info-bg clearfix">
                    <h5 class="content-title pull-left">
                        添加角色
                    </h5>
                    <div class="functions-btns pull-right">
                    </div>
                </div>
                <div class="content">
                    <div class="form-group">
                        角色名
                        <hr>
                        <input type="text" class="form-control" name='role_name'>
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