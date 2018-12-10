@extends('mutual.admins')

@section('title',$title)

@section('content')




<div class="col-md-6 col-md-offset-3" style="float: none;height: 780px">
    <div class="mws-panel-body no-padding">
        @if (session('error'))
        <div class="mws-form-message error">
            <ul>
                <li class="error"style="background-color: #ef9a9a;list-style:none;font-size: 20px">{{session('error')}}</li>
            </ul>
        </div>
        @endif
        <form action="/admin/role" method="post" class="mws-form" enctype='multipart/form-data'>
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

@section('js')
<script>

        $('.error').delay(2000).slideUp(2000);

</script>
@stop