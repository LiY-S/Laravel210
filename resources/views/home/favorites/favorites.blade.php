@extends('mutual.homes')

@section('title',$title)

@section('content')

<!-- 搜索开始 -->
<form action="/home/favorites" method="get" accept-charset="utf-8">
    <div class="col-lg-3 col-lg-offset-8"style="float: none;width: 300px">
        <div class="input-group">
          <input type="text" class="form-control" name="goods_name" placeholder="关键字" value="{{$request->goods_name}}">
          <span class="input-group-btn" >
            <button class="btn btn-default" type="submit">搜索</button>
          </span>
        </div>
    </div>
</form>
<!-- 搜索结束 -->


<!-- 收藏的商品开始 -->
<div class="new-collections">
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">收藏</h3>
            
        <div class="new-collections-grids">

             @foreach($data as $k => $v)
            
           <ul class="col-md-3 new-collections-grid">
                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                    <div class="new-collections-grid1-image">
                        <a href="single.html" class="product-image">
                            @php
                                $a = $v->photo;
                                $frist = substr($a, 0, 48 );
                            @endphp
                            <img src="{!!$frist!!}" alt=" " class="img-responsive"style="width:200px;height: 150px">
                                
                        </a>
                        <div class="new-collections-grid1-image-pos">
                            <a href="/home/single/{{$v->goods_id}}">快速浏览</a>
                        </div> 
                    </div>
                    <h4><a href="single.html"> {{$v->goods_name}}</a></h4>
                    <p>描述</p>
                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                        <p><span class="item_price">￥{{$v->goods_price}}</p>
                        <br>
                        <div style="float: right;">
                            <a href="javascript:void(0)" class="remove" gid="{!!$v->goods_id!!}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </div>
                    </div>
                </div>
            </ul>
               
                @endforeach 
            <div class="clearfix"> </div>
        </div>
        
    </div>
</div>
<!-- 收藏的商品结束 -->


<!-- 分页开始 -->
<div class="dataTables_paginate paging_full_numbers col-lg-4 col-lg-offset-5" id="DataTables_Table_1_paginate"style="float: none;width: 300px">
                {{$data->appends($request->all())->links()}}
</div>
<!-- 分页结束 -->

@stop

@section('js')

<script>
    //删除数据
    $('.remove').click(function() {
        //提示信息
        var res = confirm('你确定要删除吗');
        if (!res) return;

        //参数发送到控制器
        //获取id
        var gid = $(this).parent('div').find('.remove').attr('gid');

        var rem = $(this);

        $.get('/home/destroy',{gid:gid},function(data){

             if (data == 1) {

                rem.parents('ul').remove();
             }
        })
       

    });

</script>

@stop