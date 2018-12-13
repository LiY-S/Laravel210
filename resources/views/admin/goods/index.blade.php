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
<!-- <link href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css"> -->

    <link rel="stylesheet" href="/admins/dist/rmodal-no-bootstrap.css" type="text/css" />
        <script type="text/javascript" src="/admins/dist/rmodal.js"></script>
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
                            <!-- <th>商品颜色</th> -->
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
                            <!-- <td>
                            	{{$v->color}}
                            </td> -->
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
                            <td><!-- 
                                <a href="javascript:;" class="btn-info btn-sm waves-effect" id="showModal{{$v->id}}"></a>
                                <a href="javascript:;" class="btn-info btn-sm waves-effect" id="showModal{{$v->id}}a"></a> -->
                                <a href="/admins/goods/{{$v->id}}/edit" class="btn-info btn-sm waves-effect" style="min-width: 0px;line-height: 15px;">修改</a>
                                <form action="/admins/goods/{{$v->id}}" method='post' style='display:inline'>
                            		{{csrf_field()}}

                            		{{method_field("DELETE")}}
                            		<button class='btn btn-danger btn-sm waves-effect' style="min-width: 0px;margin-top: -16px;">删除</button>

                            	</form>
                            </td>
                        </tr>
                <!-- 添加属性表单窗口 -->
                <!-- <div id="modal{{$v->id}}" class="modal">
                    <div class="modal-dialog animated">
                        <div class="modal-content">
                            <form class="form-horizontal" method="get">
                                <div class="modal-header">
                                    <strong>添加商品颜色</strong>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="dummyText" class="control-label col-xs-4">???</label>
                                        <div class="input-group col-xs-7">
                                            <input type="text" name="dummyText" id="dummyText" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-default" type="button" onclick="modal{{$v->id}}.close();">取消</button>
                                    <button class="btn btn-primary" type="submit" onclick="modal{{$v->id}}.close();">保存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                <!-- 查看属性列表窗口 -->
                <!-- <div id="modal{{$v->id}}a" class="modal">
                    <div class="modal-dialog animated">
                        <div class="modal-content">
                            <form class="form-horizontal" method="get">
                                <div class="modal-header">
                                    <strong>HELLO，我是rmodal.js话框！</strong>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="dummyText" class="control-label col-xs-4">描述文本</label>
                                        <div class="input-group col-xs-7">
                                            <input type="text" name="dummyText" id="dummyText" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-default" type="button" onclick="modal{{$v->id}}a.close();">取消</button>
                                    <button class="btn btn-primary" type="submit" onclick="modal{{$v->id}}a.close();">保存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-left: 555px;">{{$res->links()}}</div>
                <script>
                    $('#divs').delay(1000).slideUp(2000);
                </script>
<!-- <script>
                    window.onload = function() {
                            var modal{{$v->id}} = new RModal(document.getElementById('modal{{$v->id}}'), {
                                beforeOpen: function(next) {
                                    // console.log('beforeOpen');
                                    next();
                                }
                                , afterOpen: function() {
                                    // console.log('opened');
                                }

                                , beforeClose: function(next) {
                                    // console.log('beforeClose');
                                    next();
                                }
                                , afterClose: function() {
                                    // console.log('closed');
                                }

                            });
                            var modal{{$v->id}}a = new RModal(document.getElementById('modal{{$v->id}}a'), {
                                beforeOpen: function(next) {
                                    // console.log('beforeOpen');
                                    next();
                                }
                                , afterOpen: function() {
                                    // console.log('opened');
                                }

                                , beforeClose: function(next) {
                                    // console.log('beforeClose');
                                    next();
                                }
                                , afterClose: function() {
                                    // console.log('closed');
                                }
                            });

                            document.getElementById('showModal{{$v->id}}').addEventListener("click", function(ev) {
                                ev.preventDefault();
                                modal{{$v->id}}.open();
                            }, false);
                            document.getElementById('showModal{{$v->id}}a').addEventListener("click", function(ev) {
                                ev.preventDefault();
                                modal{{$v->id}}a.open();
                            }, false);

                            window.modal{{$v->id}} = modal{{$v->id}};
                            window.modal{{$v->id}}a = modal{{$v->id}}a;
                        }
                </script> -->
@stop