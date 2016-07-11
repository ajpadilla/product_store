@extends('layouts.content')

@section('title', 'Info Product')

@section('content')
<div class="row">
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
		                  <tbody><tr>
		                    <th class="goods-page-image">Image</th>
		                    <th class="goods-page-description">Description</th>
		                    <th class="goods-page-quantity">Quantity</th>
		                    <th class="goods-page-price">Unit price</th>
		                    <th class="goods-page-total" colspan="2">Total</th>
		                  </tr>
		                  		                  <tr>
		                    <td class="goods-page-image">
		                    			                      		<a href="#"><img src="../../assets/frontend/pages/img/products/model3.jpg" alt="Berry Lace Dress"></a>
		                      			                    </td>
		                    <td class="goods-page-description">
		                      <h3><a href="#">Rerum</a></h3>
		                      <p><strong>Item 1</strong> - Color: Green; Size: S</p>
		                      <em><a href="http://tienda-online.local/en/products/show/73">Detalles del producto.</a></em>
		                    </td>
		                    		                    <td class="goods-page-quantity">
		                      <div class="product-quantity">
		                          <div class="input-group bootstrap-touchspin input-group-sm"><span class="input-group-btn"><button class="btn quantity-down bootstrap-touchspin-down" type="button"><i class="fa fa-angle-down"></i></button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input data-url="http://tienda-online.local/en/cart/change-quantity/73" type="text" value="1" readonly="" class="product-quantity-change form-control input-sm" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn quantity-up bootstrap-touchspin-up" type="button"><i class="fa fa-angle-up"></i></button></span></div>
		                      </div>
		                    </td>
		                    <td class="goods-page-price">
		                      <strong><span>$</span>79.94</strong>
		                    </td>
		                    <td class="goods-page-total">
		                      <strong><span>$</span>79.94</strong>
		                    </td>
		                    <td class="del-goods-col">
		                      <a class="del-goods delete-from-cart-list" href="http://tienda-online.local/en/cart/api/cart-delete-ajax/73">&nbsp;</a>
		                    </td>
		                  </tr>
		                  		                  <tr>
		                    <td class="goods-page-image">
		                    			                      		<a href="#"><img src="../../assets/frontend/pages/img/products/model3.jpg" alt="Berry Lace Dress"></a>
		                      			                    </td>
		                    <td class="goods-page-description">
		                      <h3><a href="#">Libero</a></h3>
		                      <p><strong>Item 1</strong> - Color: Green; Size: S</p>
		                      <em><a href="http://tienda-online.local/en/products/show/86">Detalles del producto.</a></em>
		                    </td>
		                    		                    <td class="goods-page-quantity">
		                      <div class="product-quantity">
		                          <div class="input-group bootstrap-touchspin input-group-sm"><span class="input-group-btn"><button class="btn quantity-down bootstrap-touchspin-down" type="button"><i class="fa fa-angle-down"></i></button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input data-url="http://tienda-online.local/en/cart/change-quantity/86" type="text" value="1" readonly="" class="product-quantity-change form-control input-sm" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn quantity-up bootstrap-touchspin-up" type="button"><i class="fa fa-angle-up"></i></button></span></div>
		                      </div>
		                    </td>
		                    <td class="goods-page-price">
		                      <strong><span>$</span>43.68</strong>
		                    </td>
		                    <td class="goods-page-total">
		                      <strong><span>$</span>43.68</strong>
		                    </td>
		                    <td class="del-goods-col">
		                      <a class="del-goods delete-from-cart-list" href="http://tienda-online.local/en/cart/api/cart-delete-ajax/86">&nbsp;</a>
		                    </td>
		                  </tr>
		                  		                </tbody></table>
		                </div>

		                <div class="shopping-total">
		                  <ul>
		                    <li>
		                      <em>Sub total</em>
		                      <strong class="price"><span>$</span><p id="sub-total" style="display: inline-block">123.62</p></strong>
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
		              <a href=""><button class="btn btn-primary" style="background-color: blue" type="submit">continue shopping<i class="fa fa-shopping-cart"></i></button></a>
		              <a href=""><button class="btn btn-primary" type="submit">Pay<i class="fa fa-check"></i></button></a>
		            </div>
		        	          </div>
	          <!-- END CONTENT -->
	        </div>
	    </div>
    </div>
        </div>
    </div>
</div>
@endsection