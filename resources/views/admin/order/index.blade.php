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
            <form action="" method="get">
            <div class="clear-filter">
            </div>
            <div id="table_filter" class="dataTables_filter">
                <label>
                    订单号
                    <input type="text" name="goods_id" value="{{$request->goods_id}}"  aria-controls="DataTables_Table_1">

                </label>
                <button class='btn btn-info'>搜索</button>
            </div>
            </form>

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
                                    总金额
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
                                    数量
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    买家留言
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
                                    操作
                                </font>
                            </font>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($res as $k => $v)
                    <tr role="row" class="text-center">
                        <td width="15%">
                            {{$v->goods_id}}
                        </td>

                        <td width="10%">
                            {{$v->goods_prices}}
                        </td>

                        <td width="20%">
                            {{ date('Y-m-d H:i:s',$v->create_time) }}
                        </td>

                        <td width="9%">
                            {{$v->count}}
                        </td>

                        <td width="15%">
                            {{$v->user_msg}}
                        </td>

                        <td width="10%">
                            @if($v->status=='0')
                                    <font color="#FF0000">未发货</font>
                                @elseif($v->status=='1')
                                    <font color="#F68EF1">已发货</font>
                                @elseif($v->status=='2')
                                    <font color="#1FF0A0">交易完成</font>
                            @endif
                        </td>

                        <td>
                            <a href="/admin/order/{{$v->goods_id}}/edit" class="btn btn-primary btn-sm shiny">
                                <i class="fa fa-edit"></i> 编辑
                            </a>
                            <a href="{{ url("/admin/order/{$v->oid}/show") }}" class="btn btn-primary btn-sm shiny">
                                <i class="fa  fa-calendar"></i> 订单详情
                            </a>
                            <a href="/admin/order/{{$v->id}}/edit" class="btn btn-primary btn-sm shiny">
                                <i class="fa  fa-truck"></i> 发货
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

