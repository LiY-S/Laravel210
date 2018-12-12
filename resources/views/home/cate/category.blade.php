@extends('mutual.homes')


@section('title',$title)

@section('content')

<div class="breadcrumbs">
		<div class="container">
			<!-- <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Furniture</li>
			</ol> -->
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<h3>分类</h3>
					<ul class="cate">
						@foreach ($cate as $v)
							@if ($v->pid == 0)
								<li><a>{{$v->cate_name}}</a></li>
							@endif
							@foreach ($cate as $val)
                                @if ($val->pid == $v->id)
									<ul>
										<li><a href="/home/cate/{{$val->id}}">{{$val->cate_name}}</a></li>
									</ul>
                                @endif
                            @endforeach
						@endforeach
					</ul>
				</div>
				<div class="new-products animated wow slideInUp" data-wow-delay=".5s">
					<h3>新款上市</h3>
					<div class="new-products-grids">
						@foreach ($newGoods as $v)
						<div class="new-products-grid">
							<div class="new-products-grid-left">
								<a href="/home/single/{{$v->id}}" target="view_window"><img src="{{$v->photo[0]}}" alt=" " class="img-responsive" /></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="/home/single/{{$v->id}}" target="view_window">{{$v->goods_name}}</a></h4>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price" style="color:#ff5000">￥{{$v->goods_price}}</span></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
				</div>
				@foreach ($goods as $v)
				<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp  col-md-4 " data-wow-delay=".5s" style="margin-top:0px;">
					<div class="new-collections-grid1-image">
						<a href="/home/single/{{$v->id}}" class="product-image"  target="view_window"><img src="{{$v->photo[0]}}" alt=" " class="img-responsive"></a>
						<div class="new-collections-grid1-image-pos products-right-grids-pos">
							<a href="/home/single/{{$v->id}}"  target="view_window">查看详情</a>
						</div>
					</div>
					<h4><a href="/home/single/{{$v->id}}"  target="view_window">{{$v->goods_name}}</a></h4>
					<div class="simpleCart_shelfItem products-right-grid1-add-cart">
						<p><span class="item_price" style="color:#ff5000">￥{{$v->goods_price}}</span></p>
					</div>
				</div>
				@endforeach
					<div class="clearfix" style="width:720px;"> </div>
				<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
				  {{ $goods->links() }}
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>


@endsection