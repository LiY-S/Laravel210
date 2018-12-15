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

<div class="col-md-7 col-center-block">
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
            </form>

            <table id="table" class="display datatable dataTable no-footer dtr-inline" role="grid">
                <thead>
                    <tr role="row" style="text-align:center">
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    商品名
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    尺码
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
                                    价格
                                </font>
                            </font>
                        </th>
                        <th class="sorting_desc text-center" tabindex="0" aria-controls="table" rowspan="1"
                        colspan="1" aria-label="Product: activate to sort column ascending" aria-sort="descending">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    小计
                                </font>
                            </font>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $number=0;
                    $money=0;
                    ?>
                    @foreach($data as $v)
                    <tr role="row" class="text-center">
                        <td width="25%">{{$v->goods_name}}</td>

                        <td width="10%">{{$v->size}}</td>

                        <td width="%">{{$v->count}}</td>

                        <td width="10%">{{$v->goods_prices}}</td>

                        <td width="">{{$v->goods_prices * $v->count}}</td>
                    </tr>

                    <?php
                            $number+=$v->count;

                            $money+=$v->goods_prices*$v->count;
                        ?>
                    @endforeach

                    <tr>
                        <td align="center">合计</td>
                        <td align="center">数量:</td>
                        <td align="center">{{$number}}</td>
                        <td align="center">价格:</td>
                        <td align="center">{{$money}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

