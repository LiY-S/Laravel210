@extends('mutual.admins')

@section('title',$title)

@section('content')



<div class="col-md-6 col-md-offset-3" style="float: none">
          <div class="content-box">
            <div class="head success-bg clearfix">
              <h5 class="content-title pull-left">修改密码</h5>
              <div class="functions-btns pull-right">
              </div>
            </div>

            <div class="content">
                <form>
                  	<div class="form-group">
                    <label class="control-label">原密码</label>
                    <input type="password" class="form-control"name="password" placeholder="原密码">
                  </div>
                  <div class="form-group">
                    <label class="control-label">新密码</label>
                    <input type="password" class="form-control" name="passwords" placeholder="新密码">
                  </div>
    				{{csrf_field()}}
                   <div class="form-group">
                   	<button type="button" class="btn btn-success">提交</button>
                  </div>
                </form>
            </div>
          </div>
        </div>

@stop

