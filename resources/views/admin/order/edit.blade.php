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
            <form action="" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="col-md-6 col-center-block">
                    <div class="content-box">
                        <div class="head info-bg clearfix">
                            <h5 class="content-title pull-left">
                                {{$title}}
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
                            <div class="form-group">
                                <label class="control-label info-color">
                                    订单号
                                </label>
                                <input type="text" class="form-control input-info" name="code" disabled value="{{$_GET['code']}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label info-color">
                                    订单状态
                                </label>
                                <select name="status" id="">
                                    @foreach($data as $v)
                                        @if($_GET['status']==$v->id)
                                            <option selected value="{{$v->id}}">{{$v->name}}</option>
                                        @else
                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="mws-button-row">
                                {{csrf_field()}}

                                 <button type="submit" class="btn btn-info">修改</button>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop