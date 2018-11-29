@extends('mutual.admins')

@section('title',$title)

@section('content')

<form action="/admins/cate" method='get'>
            <div class="dataTables_filter" id="DataTables_Table_1_filter" style="float: right;">
                    <input type="text" name='catname' value="{{$request->catname}}" aria-controls="DataTables_Table_1">

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
                            <th>分类名</th>
                            <th>父级分类</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($res as $k=>$v)
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
                            <td>{{$v->cate_name}}</td>
                            <td>
                                @php
                                    $rs = DB::table('shop_category')->get();
                                @endphp
                                @foreach($rs as $value)
                                	@if($v->pid == $value->id)
                                		{{$value->cate_name}}
									@elseif($v->pid == 0 && $v->id == $value->id)
										顶级分类
									@endif
								@endforeach
                            </td>
                            <td>
                            	@if($v->status == 1)
                            		启用
                            	@else
                            		禁用
                            	@endif
                            </td>
                            <td>
                               <a href="/admins/cate/{{$v->id}}/edit" class="btn-info btn-sm waves-effect" style="min-width: 0px;line-height: 15px;">修改</a>
                               <form action="/admins/cate/{{$v->id}}" method='post' style='display:inline'>
                            		{{csrf_field()}}

                            		{{method_field("DELETE")}}
                            		<button class='btn btn-danger btn-sm waves-effect' style="min-width: 0px;margin-top: -16px;">删除</button>

                            	</form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
@stop