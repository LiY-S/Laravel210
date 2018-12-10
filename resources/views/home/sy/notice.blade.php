@extends('mutual.homes')

@section('title',$title)

@section('content')
<style>
    p{
        line-height: 30px;
    }
</style>
    <div class="register">
        <div class="container">
            <h3>{{$gong->title}}</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s" style="font-size: 18px;">更新于{{date('Y-m-d H:i',$gong->tiantime)}} </p>
            <div style="margin-left: 230px;">
                {!!$gong->contents!!}
            </div>

        </div>
    </div>

@stop

@section('js')

@stop
