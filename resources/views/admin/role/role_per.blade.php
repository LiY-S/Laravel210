@extends('mutual.admins')

@section('title',$title)

@section('content')
	
<div class="col-md-6 col-md-offset-3" style="float: none;height: 100%">
    <div class="mws-panel-body no-padding">
        @if (session('error'))
        <div class="mws-form-message error">
            <ul>
                <li class="error"style="background-color: #ef9a9a;list-style:none;font-size: 20px">{{session('error')}}</li>
            </ul>
        </div>
        @endif


        	<form action="/admin/do_role_per?id={{$res->id}}" method="post" class="mws-form" >
        		<!-- <div class="mws-form-inline"> -->
        			<!-- <div class="content"> -->
                    <div class="form-group">
                        角色名
                        <hr>
                        <input type="text" class="form-control" name='role_name'value='{{$res->role_name}}'>
                    </div> <br>&nbsp;&nbsp;<br>
                <!-- </div> -->
                        <div class="form-group">
                        权限路径名
                        <hr>
                        </div> 
                        
                        <div >
                            <!-- <ul class="checkbox-inline" > -->
                                @foreach($per as $k=>$v)
                                    @if(in_array($v->id,$info))
                                    <!-- <li> -->
                                        <label  class="inline">
                                            <input type="checkbox" name='per_id[]' value='{{$v->id}}' checked>{{$v->url_name}}
                                        </label>&nbsp;&nbsp;&nbsp;
                                    <!-- </li> -->
                                    @else
                                    <!-- <li> -->
                                        <label class="inline">
                                            <input type="checkbox" name='per_id[]' value='{{$v->id}}'>{{$v->url_name}}
                                        </label>&nbsp;&nbsp;&nbsp;
                                    <!-- </li> -->
                                    @endif
                                @endforeach
                               </div>
                            <!-- </ul> -->
                        
    


                    <!-- </div>        			 -->
        		<!-- </div> -->
                <br>&nbsp;&nbsp;<br>
        		<div class="mws-button-row">
					{{csrf_field()}}

        			 <button type="submit" class="btn btn-info">
                提交
            </button>
        			
        		</div>
        	</form>
        <!-- </div>    	 -->
    <!-- </div> -->
@stop

@section('js')
<script>
	$('.mws-form-message').delay(2000).fadeOut(2000);
</script>
@stop