@extends('mutual.admins')

@section('title','订单管理')

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
            <div class="clear-filter">
            </div>
            <div id="table_filter" class="dataTables_filter">
                <label>
                    订单号
                    <input type="text" name="goods_id" value=""  aria-controls="DataTables_Table_1">

                </label>
                <button class='btn btn-info'>搜索</button>
            </div>

            <table id="table" class="display datatable dataTable no-footer dtr-inline" role="grid">
                <thead>
                    <tr role="row" style="text-align:center">
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    订单号
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
                                    收货信息
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    订单状态
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    下单时间
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr role="row" class="text-center">
                        <td width="16%"><a href="/admin/lists?code={{$value->code}}">{{$value->code}}</a></td>

                        <td width="16%">
                            {{$value->username}}
                        </td>

                        <td width="15%">
                            <a href="/admin/addr?id={{$value->addr}}">收货人信息</a>
                        </td>

                        <td width="15%">
                            {{$value->name}}
                        </td>

                        <td width="20%">
                            {{date("Y-m-d H:i:s"),$value->create_time}}
                        </td>

                        <td>
                            @if($value->status==6)
                            <a href="javascript:;">修改状态</a>
                            @else
                            <a href="/admin/edit?status={{$value->status}}&code={{$value->code}}">修改状态</a>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate"style="margin-right: 100px;margin-top: -20px">
                    {{$res->appends($request->all())->links()}}
                </div>
        </div>
    </div>
</div>
@stop

