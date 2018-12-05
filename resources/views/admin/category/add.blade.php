@extends('mutual.admins')

@section('title',$title)

@section('content')




@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div class="col-lg-12" style="float: none">
    <div class="content-box">
        <div class="head success-bg clearfix">
            <h5 class="content-title pull-left">
                添加分类
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
            <div class="row">
                <div class="col-md-10">
                    <form class="form-horizontal" action="/admins/cate" method="post">
                        <div class="form-group">
                            <label for="inputText" class="col-sm-2 control-label">
                                分类名
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" placeholder=""
                                name="cate_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                顶级分类
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" name="pid">
                                    <option value="0">
                                        ---请选择---
                                    </option>
                                    @foreach($res as $v)
                                    <option value="{{$v->id}}">{{$v->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        .
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                状态
                            </label>
                            <div class="radio  material radio-success" style="margin-top: 13px;float: none；">
                                <label>
                                    <input type="radio" name="status" value="1" checked="">
                                    <span class="circle">
                                    </span>
                                    <span class="check">
                                    </span>
                                    <i>
                                    </i>
                                    <p class="">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;启用
                                    </p>
                                </label>
                            </div>
                            <div class="radio  material radio-danger" style="margin-left: 100px;float: none；">
                                <label>
                                    <input type="radio" name="status" value="0">
                                    <span class="circle">
                                    </span>
                                    <span class="check">
                                    </span>
                                    <i>
                                    </i>
                                    <p class="">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;禁用
                                    </p>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="col-sm-6 control-label">
                            </label>
                            {{csrf_field()}}
                        	<button class="btn btn-success btn-lg waves-effect" style="margin-top: 20px;">
				            	添加
				           	</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection