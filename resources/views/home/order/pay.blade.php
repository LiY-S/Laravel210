@extends('mutual.homes')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<style>
    .qujiesuan{
        border-style:solid;
        border-width:1px;
        border-color:#FFF;
        background: #fff;
        width: 290px;
        height: 40px;
        outline: none;
        /*border:1px;*//*不要设置border*/
    }
</style>

@stop


@section('js')

    <script>

        alert('已支付成功');

    </script>
@stop