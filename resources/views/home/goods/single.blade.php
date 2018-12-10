@extends('mutual.homes')

@section('title',$title)

@section('content')
<link href="/homes/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/homes/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="/homes/js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="/homes/js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="/homes/css/jquery-ui.css">
<script src="/homes/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>主页</a></li>
				<li class="active">Single Page</li>
			</ol>
		</div>
	</div>
<div class="single">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<h3>分类</h3>
					<ul class="cate">
						@foreach ($cate as $v)
							@if ($v->pid == 0)
								<li><a href="products.html">{{$v->cate_name}}</a></li>
							@endif
							@foreach ($cate as $val)
                                @if ($val->pid == $v->id)
									<ul>
										<li><a href="products.html">{{$val->cate_name}}</a></li>
									</ul>
                                @endif
                            @endforeach
						@endforeach
					</ul>
				</div>
			</div>
			@foreach ($res as $v)
			<div class="col-md-8 single-right">
				<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
			    	<div class="flexslider">
						<ul class="slides">
							<li data-thumb="{{$v->photo[2]}}">
								<div class="thumb-image"> <img src="{{$v->photo[2]}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="{{$v->photo[0]}}">
								 <div class="thumb-image"> <img src="{{$v->photo[0]}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="{{$v->photo[1]}}">
							   <div class="thumb-image"> <img src="{{$v->photo[1]}}" data-imagezoom="true" class="img-responsive"> </div>
							</li> 
						</ul>
					</div>
			   		<!-- flixslider -->
						<script defer src="/homes/js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="/homes/css/flexslider.css" type="text/css" media="screen" />
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					<!-- flixslider -->
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
					<h3>{{$v->goods_name}}</h3>
					<h4><span class="item_price">${{$v->goods_price}}</span></h4>
					<div class="occasional">
						<h5>鞋码 :</h5>
						@foreach ($v->size as $val)
						<div class="colr ert">
							<label class="radio"><input type="radio" name="radio"><i></i>{{$val}}</label>
						</div>
						@endforeach
						<div class="clearfix"> </div>
					</div>
					<div class="color-quality">
						<!-- <div class="color-quality-left">
							<h5>颜色 : </h5>
							<ul>
								<li><button class="label label-default">{{$v->color}}</button></li>
							</ul>
						</div> -->
						<div class="color-quality-left" style="margin-top: -20px;">
							<h5>数量 :</h5>
							<input class="shuliang" type="number" style="width: 100px;" value="1">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="occasion-cart" style="margin-top: 50px;">
						<a class="item_add" href="#">加入购物车</a>
					</div>
				</div>
				<div class="clearfix"> </div>
				<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs" style="margin-left: -250px;width: 100%;">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active" style="float: right;"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">商品详情</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								{!!$v->repertory!!}
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				$('.shuliang').focus(function(){
					// console.log($(this).val());
						$(this).next().remove();
					$(this).after('<font style="color:#999">(库存剩余{{$v->rid}})</font>');
				});
				$('.shuliang').blur(function(){
						$(this).next().remove();
					if($(this).val() > {{$v->rid}}){
						$(this).after('<font style="color:red">不能大于库存数量</font>');
						$(this).val(1);
					}
				})
			</script>
			@endforeach
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- <div class="single-related-products">
		<div class="container">
			<h3 class="animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">Related Products</h3>
			<p class="est animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>
			<div class="new-collections-grids">
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
						<div class="new-collections-grid1-image">
							<a href="single.html" class="product-image"><img src="images/8.jpg" alt=" " class="img-responsive"></a>
							<div class="new-collections-grid1-image-pos">
								<a href="single.html">Quick View</a>
							</div>
							<div class="new-collections-grid1-right">
								<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<h4><a href="single.html">Running Shoes</a></h4>
						<p>Vel illum qui dolorem eum fugiat.</p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p><i>$280</i> <span class="item_price">$150</span><a class="item_add" href="#">add to cart </a></p>
						</div>
					</div>
				</div>
				<div class="col-md-6 new-collections-grid">
					<div class="new-collections-grid1-sub">
						<div class="new-collections-grid1 animated wow slideInLeft animated" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: slideInLeft;">
							<div class="new-collections-grid1-image">
								<a href="single.html" class="product-image"><img src="images/6.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos">
									<a href="single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right">
									<div class="rating">
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="single.html">Wall Lamp</a></h4>
							<p>Vel illum qui dolorem eum fugiat.</p>
							<div class="new-collections-grid1-left simpleCart_shelfItem">
								<p><i>$480</i> <span class="item_price">$400</span><a class="item_add" href="#">add to cart </a></p>
							</div>
						</div>
					</div>
					<div class="new-collections-grid1-sub">
						<div class="new-collections-grid1 animated wow slideInLeft animated" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: slideInLeft;">
							<div class="new-collections-grid1-image">
								<a href="single.html" class="product-image"><img src="images/9.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos">
									<a href="single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right">
									<div class="rating">
										<div class="rating-left">
											<img src="images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="single.html">Wall Lamp</a></h4>
							<p>Vel illum qui dolorem eum fugiat.</p>
							<div class="new-collections-grid1-left simpleCart_shelfItem">
								<p><i>$280</i> <span class="item_price">$150</span><a class="item_add" href="#">add to cart </a></p>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 animated wow slideInLeft animated" data-wow-delay=".8s" style="visibility: visible; animation-delay: 0.8s; animation-name: slideInLeft;">
						<div class="new-collections-grid1-image">
							<a href="single.html" class="product-image"><img src="images/11.jpg" alt=" " class="img-responsive"></a>
							<div class="new-collections-grid1-image-pos">
								<a href="single.html">Quick View</a>
							</div>
						</div>
						<h4><a href="single.html">Stones Bangles</a></h4>
						<p>Vel illum qui dolorem eum fugiat.</p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p><i>$340</i> <span class="item_price">$257</span><a class="item_add" href="#">add to cart </a></p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div> -->

	<script src="/homes/js/imagezoom.js"></script>

@endsection