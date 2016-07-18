@extends('layouts.content')

@section('title', 'Show Cart')

@section('content')
@if (isset($cart))
<div class="row">
	@include('layouts.partials._errors')
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
									                    <th class="goods-page-quantity">Quantity</th>
									                    <th class="goods-page-price">Unit price</th>
									                    <th class="goods-page-total" colspan="2">Total</th>
			                  						</tr>
			                  						@if($cart->hasProducts())
				                  						@foreach ($cart->products as $product)
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
		                          									<input data-url="{{ route('cart.change-quantity', $product->id) }}" type="text" value="{{ $product->pivot->quantity }}" readonly class="product-quantity-change form-control input-sm">
		                      									</div>
				                    						</td>
											                <td class="goods-page-price">
											                	<strong><span>$</span>{{ $product->getNumberFormat($product->price) }}</strong>
											                </td>
											                <td class="goods-page-total">
											                	<strong><span>$</span>{{ $product->total }}</strong>
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

						                <div class="shopping-total">
						                  <ul>
						                    <li>
						                      <em>Sub total</em>
						                      <strong class="price"><span>$</span><p id="sub-total" style="display: inline-block">{{ $cart->total }}</p></strong>
						                    </li>
						                    <li>
						                      <em>Shipping Cost</em>
						                      <strong class="price"><span>$</span><p id="ship-cost" style="display: inline-block">3</p></strong>
						                    </li>
						                    <li class="shopping-total-price">
						                      <em>Total</em>
						                      <strong class="price"><span>$</span><p id="total" style="display: inline-block">123.62</p></strong>
						                    </li>
						                  </ul>
						                </div>
		              				</div>		              
					              	<a href="">
						              <button class="btn btn-primary" style="background-color: blue" type="submit">continue shopping
						              	<i class="fa fa-shopping-cart"></i>
						              </button>
					              	</a>
		              				<a href= "{{ route('payment.status') }}">
		              					<button class="btn btn-primary" type="submit">Pay<i class="fa fa-check"></i>
		              					</button>
		              				</a>
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