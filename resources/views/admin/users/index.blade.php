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

<div class="col-md-10 col-center-block">
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
            <form action="/admin/users" method="get">
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
                                    会员
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    邮箱
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
                                    电话
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
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    注册时间
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    ip
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
                        <td width="5%">
                            {{$v->id}}
                        </td>

                        <td width="9%">
                            {{$v->username}}
                        </td>

                        <td width="7%">
                            @if($v->vip == 1)

                                会员

                            @else

                                非会员

                            @endif
                        </td>

                        <td width="12%">
                            {{$v->email}}
                        </td>

                        <td width="10%">
                            <img src="{{$v->profile}}" alt="" width="30" height="30">
                        </td>

                        <td width="7%">
                            {{$v->phone}}
                        </td>

                        <td width="7%">
                            @if($v->status == 1)

                                开启

                            @else

                                禁用

                            @endif
                        </td>

                        <td width="12%">
                            {{date('Y-m-d', $v->register_time)}}
                        </td>

                        <td width="12%">
                            {{$v->last_ip}}
                        </td>

                        <td>
                            <button>
                                @if($v->status==2)
                                    <i class="fa  fa-ban"></i>禁用
                                @else
                                    <i class="fa fa-check-circle-o"></i>启用
                                @endif
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

