@extends('mutual.admins')

@section('title',$title)

@section('content')
  <script src="/admins/admins/bower_components/jquery/dist/jquery.min.js"></script>

@if (session('success'))
    <div class="alert alert-info alert-dismissible fade in" role="alert" id="divs">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>{{session('success')}}</strong>
    </div>
@endif
<div class="form-group" style="margin-bottom: 35px;">
        <label for="inputPassword3" class="col-sm-2 control-label">
        商品名称:
    </label>
    <div class="col-sm-10" style="margin-left: 85px;margin-top: -27px;">
    	{{$goods->goods_name}}
    </div>
</div>
<form action="/admins/colors/{{$goods->id}}" method='get'>
            <div class="dataTables_filter" id="DataTables_Table_1_filter" style="float: right;">
                    <input type="text" name='color' value="{{$request->color}}" aria-controls="DataTables_Table_1">

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
                            <th>颜色</th>
                            <th>展示图</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($colors as $v)
                        <tr>
                            <td>
                            	{{$v->color}}
                            </td>
                            <td>
                            	<img src="{{$v->photo[0]}}" alt=""  width="80">
                            	<img src="{{$v->photo[1]}}" alt=""  width="80">
                            	<img src="{{$v->photo[2]}}" alt=""  width="80">
                            </td>
                            <td>
                                <a href="/admins/colors/edit/{{$v->id}}" class="btn-info btn-sm waves-effect" style="min-width: 0px;line-height: 15px;">修改</a>
                            		<a href="/admins/colors/delete/{{$v->id}}" class='btn btn-danger btn-sm waves-effect' style="min-width: 0px;margin-top: -16px;">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-left: 555px;">{{$colors->links()}}</div>
                <script>
                	$('#divs').delay(1000).slideUp(2000);
                </script>
@endsection