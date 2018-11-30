@extends('mutual.admins')

@section('title',$title)

@section('content')

<div class="col-md-6 col-md-offset-3" style="float: none;height: 740px">
    @if (session('success'))
        <div class="mws-form-message error">
            <ul>
                <center>
                <li class="error"style="background-color: green;list-style:none;font-size: 20px; width: 1000px;text-align: center; ">{{session('success')}}</li>
                </center>
            </ul>
        </div>
        @endif
    @if (session('error'))
        <div class="mws-form-message error">
            <ul>
                <li class="error"style="background-color: #ef9a9a;list-style:none;font-size: 20px">{{session('error')}}</li>
            </ul>
        </div>
        @endif
    <form action="/admin/pass" method="post" class="mws-form" enctype='multipart/form-data'>
        <div class="content-box">
            <div class="head success-bg clearfix">
                <h5 class="content-title pull-left">
                    修改密码
                </h5>
                <div class="functions-btns pull-right">
                </div>
            </div>
            <form>
                <div class="content">
                    <div class="form-group">
                        <label class="control-label">
                            原密码
                        </label>
                        <input type="password" class="form-control" name="password" placeholder="原密码">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            新密码
                        </label>
                        <input type="password" class="form-control" name="passwords" placeholder="新密码">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            确认密码
                        </label>
                        <input type="password" class="form-control" name="passwordss" placeholder="新密码">
                    </div>
                </div>
                {{csrf_field()}}
        </div>
        <button type="submit" class="btn btn-success">
            提交
        </button>
        </form>
</div>


@stop

@section('js')
<script>

        $('.error').delay(2000).slideUp(2000);

</script>
@stop