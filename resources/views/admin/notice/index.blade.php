@extends('mutual.admins')

@section('title',$title)

@section('content')
@if (session('success'))
        <div class="mws-form-message error">
            <ul>
                <center>
                <li class="error"style="background-color: green;list-style:none;font-size: 20px; width: 1000px;text-align: center; ">{{session('success')}}</li>
                </center>
            </ul>
        </div>
        @endif
<div class="col-md-8 col-md-offset-2" style="float: none;height: 740px">
    <form action="/admin/notice" method='get'>
        <div class="data-info">
            <div id="table1_wrapper" class="dataTables_wrapper no-footer">
                <form action="/admin/notice" method='get'>
                    <div class="toolbar tool1">
                        <h5 class="zero-m">
                            <div id="DataTables_Table_1_length" class="dataTables_length">
                                <label>
                                    显示
                                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                                        <option value="5" @if ($request -> num == 10) selected="selected" @endif> 5
                                        </option>
                                        <option value="10" @if ($request-> num == 20) selected="selected" @endif> 10
                                        </option>
                                        <option value="15" @if ($request-> num == 30) selected="selected" @endif> 15
                                        </option>
                                    </select>
                                    条数据
                                </label>
                            </div>
                        </h5>
                    </div>
                    <div id="table2_filter" class="dataTables_filter">
                        <label>
                            <input type="search" class="" placeholder="关键字" aria-controls="table2"name='title' value="{{$request->title}}">
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
                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product: activate to sort column descending"> 公告标题</th>
                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1"aria-label="Number of Orders: activate to sort column ascending" style="width: 418px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @foreach($res as $k => $v) @if($k % 2 == 0)
                            <tr class="odd">
                            @else
                            <tr class="even">
                            @endif

                            @php
                                $i++;
                            @endphp

                                <td class="">
                                    {{$i + (($res->currentPage() - 1) *$numm)}}
                                </td>
                                <td class="uname">
                                    {{$v->title}}
                                </td>
                                <td style="padding-left: 150px;">
                                    <a href="/admin/notice/{{$v->id}}/edit" class='btn btn-danger'style="background-color: #ef9a9a;color:#fff; width:100px">
                                        修改
                                    </a>
                                    <!-- <form action="/admin/role/{{$v->id}}/edit" method='post' style='display:inline'>
                                        {{csrf_field()}}
                                        <button class='btn btn-danger'style="background-color: #ef9a9a">
                                            修改
                                        </button>
                                    </form> -->
                                    <form action="/admin/notice/{{$v -> id}}" method='post' style='display:inline'>
                                        {{csrf_field()}}
                                        {{method_field("DELETE")}}
                                        <button class='btn btn-danger'style="background-color: #e1bee7">
                                            删除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                 <div class="dataTables_info" id="DataTables_Table_1_info">
                当前页码是&nbsp&nbsp{{$res->currentPage()}}&nbsp&nbsp

                一共{{$res->total()}}条数据

            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate"style="margin-right: 100px;margin-top: -20px">

                {{$res->appends($request->all())->links()}}

            </div>
        </div>
    </form>
    </div>


 @stop

 @section('js')
<script>

        $('.error').delay(2000).slideUp(2000);

</script>
@stop