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

<div class="col-md-8 col-center-block">
    <div class="data-info">
        <div id="table_wrapper" class="dataTables_wrapper no-footer">
            <div class="toolbar tool" style="padding: 7px 20px;">
                <h5 class="content-title">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            {{$title}}
                        </font>
                    </font>
                </h5>
            </div>
            <form action="/admin/user" method="get">
            <div class="clear-filter">
            </div>
            <div id="table_filter" class="dataTables_filter">
                <label>
                    用户名
                    <input type="text" name="username" value="{{$request->username}}"  aria-controls="DataTables_Table_1">

                </label>
                <button class='btn btn-info'>搜索</button>
            </div>
            </form>

            <table id="table" class="display datatable dataTable no-footer dtr-inline"
            role="grid">
                <thead>
                    <tr role="row" style="text-align:center">
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    ID
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    用户名
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    头像
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    状态
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1" align="center"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    操作
                                </font>
                            </font>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($res as $k => $v)
                    <tr role="row" class="text-center">
                        <td>
                            {{$v->id}}
                        </td>

                        <td>
                            {{$v->username}}
                        </td>

                        <td>
                            <img src="{{$v->profile}}" alt="" width="30px" height="30px">
                        </td>

                        <td>

                            {{sta($v->status)}}

                        </td>

                        <td align="center" width="30%">
                            <a href="/admin/user_role?id={{$v->id}}" class="btn btn-primary btn-sm shiny">
                                <i class="fa fa-user-md"></i> 角色
                            </a>
                            <a href="/admin/user/{{$v->id}}/edit" class="btn btn-primary btn-sm shiny">
                                <i class="fa fa-edit"></i>修改
                            </a>

                            <form action="/admin/user/{{$v->id}}" method='post' style='display:inline'>
                                {{csrf_field()}}

                                {{method_field("DELETE")}}
                                <button class='btn btn-danger btn-sm shiny'>

                                    <i class="fa fa-trash-o"></i>删除

                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

@section('js')
<script>
    $('.mws-form-message').delay(1000).fadeOut(2000);

    //双击用户名进行修改
    $('.username').dblclick(function(){

        //获取用户名
        var um = $(this).text().trim();

        //创建input
        var ipu = $('<input type="text" />');
        $(this).empty();
        $(this).append(ipu);
        ipu.val(um);
        ipu.select();
        var tds = $(this);

        //失去焦点
        ipu.blur(function(){
            //获取input框里面的值
            var uv = $(this).val();
            //获取id
            var ids = $(this).parents('tr').find('td').eq(0).text().trim();

            // console.log(id);
            $.get('/admin/usajax',{uv:uv,ids:ids},function(data){

                // console.log(data);
                if(data == 1){

                    //让输入框消失  但是输入框里面的值留下
                    tds.text(uv);
                } else {

                    tds.text(um);
                }
            })
        })
    })
</script>

@stop