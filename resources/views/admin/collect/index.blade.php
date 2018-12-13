@extends('mutual.admins')

@section('title',$title)

@section('content')

<div class="col-md-8 col-md-offset-2" style="float: none;height: 780px">
    <form action="/admin/collect" method='get'>
        <div class="data-info">
            <div id="table1_wrapper" class="dataTables_wrapper no-footer">
                <form action="/admin/collect" method='get'>
                    <div class="toolbar tool1">
                        <h5 class="zero-m">
                            <div id="DataTables_Table_1_length" class="dataTables_length">
                                <label>
                                    显示
                                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                                        <option value="10" @if($request->num == 10) selected="selected" @endif> 10</option>
                                        <option value="25" @if($request->num == 25) selected="selected" @endif> 25</option>
                                        <option value="30" @if($request->num == 30) selected="selected" @endif> 30</option>
                                    </select>
                                    条数据
                                </label>
                            </div>
                        </h5>
                    </div>
                    <div id="table2_filter" class="dataTables_filter">
                        <label>
                            <input type="search" class="" placeholder="关键字" aria-controls="table2"name='user_id' value="{{$request->user_id}}">
                        </label>
                        <button class='btn btn-info' style="font-size: 20px;margin-down: 0px">
                            搜索
                        </button>
                    </div>
                </form>
                <table id="table1" class="display datatable no-stripes table dataTable no-footer dtr-inline">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product: activate to sort column descending">ID</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product: activate to sort column descending"> 用户ID</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product: activate to sort column descending"> 商品ID</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product: activate to sort column descending"> 收藏时间</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                       @foreach($res as $k => $v)
                            <tr class="even">
                                <td class="">{{$v->id}}</td>
                                <td class="">{{$v->user_id}}</td>
                                <td class="">{{$v->goods_id}}</td>
                                <td>{{date('Y-m-d H:i:s',$v->collect_time)}}</td>
                            </tr>
                            @endforeach  
                             </form>
                    </tbody>
                </table>
                <div class="dataTables_info" id="DataTables_Table_1_info">
                当前页码是&nbsp&nbsp{{$res->currentPage()}}&nbsp&nbsp  
                    
                一共{{$res->total()}}条数据
            
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate"style="margin-right: 100px;margin-top: -20px">
                
                {{$res->appends($request->all())->links()}}

            </div>
    </form>
    </div>

     
 @stop

