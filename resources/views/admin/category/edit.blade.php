@extends('mutual.admins')

@section('title',$title)

@section('content')

@if (session('error'))
            <div class="alert alert-danger alert-dismissible fade in" role="alert" id="divs">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('error')}}</strong>
            </div>
        @endif
<div class="col-lg-12" style="float: none">
    <div class="content-box">
        <div class="head success-bg clearfix">
            <h5 class="content-title pull-left">
                修改分类
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
                    <form class="form-horizontal" action="/admins/cate/{{$res->id}}" method="post">
                        <div class="form-group">
                            <label for="inputText" class="col-sm-2 control-label">
                                分类名
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" placeholder="" value="{{$res->cate_name}}" name="cate_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                顶级分类
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" name="pid">
                                    <option value="0">
                                        顶级分类
                                    </option>
                                    @foreach($cat as $v)
                               			<option value='{{$v->id}}' @if($res->pid == $v->id) selected @endif>{{$v->cate_name}}</option>
                                	@endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                状态
                            </label>
                            <div class="radio  material radio-success" style="margin-top: 13px;float: none；">
                                <label>
                                    <input type="radio" name="status" value="1"  @if($res->status == 1) checked @endif>
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
                                    <input type="radio" name="status" value="0"  @if($res->status == 0) checked @endif>
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
                            {{method_field('PUT')}}
                        	<button class="btn btn-success btn-lg waves-effect" style="margin-top: 20px;">
				            	修改
				           	</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#divs').delay(1000).slideUp(2000);
</script>
@endsection