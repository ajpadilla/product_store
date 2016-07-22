@extends('layouts.content')

@section('title', 'Show Cart')

@section('content')
@if (!empty($wishlist))
<div class="row">
	@include('layouts.partials._errors')
	@include('layouts.partials._messages')
	<div class="col-lg-12">
        <div class="wrapper wrapper-content">
            	<div class="panel-body">
					<div class="panel blank-panel">
	        			<div class="row margin-bottom-40">
	          			<!-- BEGIN CONTENT -->
	          				<div class="col-md-12 col-sm-12">
	            				<h1>Cart</h1>
	            				<div class="goods-page">
		              				<div class="goods-data clearfix">
		                				<div class="table-wrapper-responsive">
		                					<table summary="Shopping cart">
		                  						<tbody>
			                  						<tr>
									                    <th class="goods-page-image">Image</th>
									                    <th class="goods-page-description">Description</th>
									                    <th class="goods-page-quantity">STOCK</th>
									                    <th class="goods-page-price">Unit price</th>
									                    <th class="goods-page-total">ADD CART</th>
									                    <th class="goods-page-total">DELETE</th>
			                  						</tr>
			                  						@if(!empty($wishlist))
				                  						@foreach ($wishlist as $product)
				                  						<tr>
				                    						<td class="goods-page-image">
				                    							@if ($product->hasPhotos())
				                    							<a href="#">
				                    			            		<img src="/{{ $product->first_photo->complete_thumbnail_path }}" alt="Berry Lace Dress">
				                    			                </a>
				                    							@endif
				                      			            </td>
											                <td class="goods-page-description">
											                	<h3><a href="#">{{ $product->name }}</a></h3>
											                    <p>
											                    	<strong>{{ $product->description }}</strong>
											                    </p>
											                    <em>
											                    	<a href="{{ route('product.show', $product->id) }}">Product Details.</a>
											                    </em>
											                </td>
											                 <td class="goods-page-quantity">
											                	<div class="product-quantity">
		                          									<strong>{{ $product->quantity}}</strong>
		                      									</div>
				                    						</td>
											                <td class="goods-page-price">
											                	<strong><span>$</span>{{ $product->getNumberFormat($product->price) }}</strong>
											                </td>
											                <td class="del-goods-col">
										                       <button href="{{ route('cart.store', $product->id) }}" class="add_cart btn btn-success btn-outline dim" style="margin-left: 20px" type="button" data-toggle="tooltip" data-placement="top" data-original-title="Agregar al carro de compras" title="Agregar al carro de compras">
										                       	<i class="fa fa-shopping-cart fa"></i>
										                       </button>
										                    </td>
											                <td class="del-goods-col">
											                	<a class="del-goods delete-from-cart-list" href="{{ route('cart.delete-ajax', $product->id) }}">&nbsp;</a>
											                </td>
				                  						</tr>
				                  						@endforeach
			                  						@endif
		                  		                </tbody>
		                  		            </table>
		                				</div>
		              				</div>		              
		            			</div>
		        	    	</div>
	          <!-- END CONTENT -->
	        			</div>
	    			</div>
    			</div>
        	</div>
    </div>
</div>
@endif
@endsection