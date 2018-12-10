<<<<<<< Updated upstream
=======
@extends('mutual.admins')

@section('title',$title)

@section('content')
@if (session('success'))
            <div class="alert alert-info alert-dismissible fade in" role="alert" id="divs">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('success')}}</strong>
            </div>
        @endif
<form action="/admins/goods" method='get'>
            <div class="dataTables_filter" id="DataTables_Table_1_filter" style="float: right;">
                    <input type="text" name='goods_name' value="{{$request->goods_name}}" aria-controls="DataTables_Table_1">

                <button class='btn btn-info'>搜索</button>
            </div>
            <div id="DataTables_Table_1_length" class="dataTables_length">
                    显示
                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                         <option value="10" @if($request->num == 10)  selected="selected" @endif>
                            10
                        </option>
                        <option value="25"  @if($request->num == 25)  selected="selected" @endif>
                            15
                        </option>
                        <option value="30"  @if($request->num == 30)  selected="selected" @endif>
                            20
                        </option>
                    </select>
                    条数据
            </div>
            </form>
<table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="table-check">
                                <div class="checkbox checkbox-primary">
                                  <label><input type="checkbox">
                                    <i></i></label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>所属分类</th>
                            <th>商品封面</th>
                            <th>商品名</th>
                            <th>商品尺码</th>
                            <th>商品颜色</th>
                            <th>商品价格</th>
                            <th>商品库存</th>
                            <th>商品状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($res as $v)
                        <tr>
                            <td class="table-check">
                                <div class="checkbox checkbox-primary">
                                  <label><input type="checkbox">
                                    <i></i></label>
                                </div>
                            </td>
                            <td>
                                {{$v->id}}
                            </td>
                            <td>
                            	{{$v->cate_id}}
                            </td>
                            <td>
                                <img src="{{$v->photo[0]}}" alt="" width="60">
                            </td>
                            <td>
                            	{{$v->goods_name}}
                            </td>
                            <td>
                            	{{$v->size}}
                            </td>
                            <td>
                            	{{$v->color}}
                            </td>
                            <td>
                            	{{$v->goods_price}}
                            </td>
                            <td>
                            	{{$v->rid}}
                            </td>
                            <td>
                            	@if ($v->status == 1)
                            		销售中
                            	@else
                            		下架
                            	@endif
                            </td>
                            <td>
                               <a href="/admins/goods/{{$v->id}}/edit" class="btn-info btn-sm waves-effect" style="min-width: 0px;line-height: 15px;">修改</a>
                               <form action="/admins/goods/{{$v->id}}" method='post' style='display:inline'>
                            		{{csrf_field()}}

                            		{{method_field("DELETE")}}
                            		<button class='btn btn-danger btn-sm waves-effect' style="min-width: 0px;margin-top: -16px;">删除</button>

                            	</form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-left: 555px;">{{$res->links()}}</div>
<script>
    $('#divs').delay(1000).slideUp(2000);
</script>
@stop
>>>>>>> Stashed changes
