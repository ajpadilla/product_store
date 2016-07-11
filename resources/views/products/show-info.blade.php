@extends('layouts.content')

@section('title', 'Info Product')

@section('content')
<div class="content-wrapper">	
	<div class="item-container">	
		<div class="container">	
			<div class="col-md-12">
				<div class="product col-md-6 service-image-left">
					<center>
						<img id="item-display" src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
					</center>
				</div>
				<div class="container service1-items col-sm-2 col-md-2 pull-left">
					<center>
						<a id="item-1" class="service1-item">
							<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
						</a>
						<a id="item-2" class="service1-item">
							<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
						</a>
						<a id="item-3" class="service1-item">
							<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
						</a>
					</center>
				</div>
			</div>

			<div class="col-md-7">
				<div class="product-title">Corsair GS600 600 Watt PSU</div>
				<div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>
				<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
				<hr>
				<div class="product-price">$ 1234.00</div>
				<div class="product-stock">In Stock</div>
				<hr>
				<div class="btn-group cart">
					<button type="button" class="add_cart btn btn-success">
						Add to cart 
					</button>
				</div>
				<div class="btn-group wishlist">
					<button type="button" class="btn btn-danger">
						Add to wishlist 
					</button>
				</div>
			</div>
		</div> 
	</div>
	<div class="container-fluid">		
		<div class="col-md-12 product-info">
			<ul id="myTab" class="nav nav-tabs nav_tabs">
				<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
				<li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
				<li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="service-one">
					<section class="container product-info">

					</section>
				</div>
				<div class="tab-pane fade" id="service-two">
					<section class="container">

					</section>
				</div>
				<div class="tab-pane fade" id="service-three">

				</div>
			</div>
			<hr>
		</div>
	</div>
</div>
@endsection