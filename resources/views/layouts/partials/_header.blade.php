<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			@if (\Auth::check())
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<i class="fa fa-shopping-cart fa-lg"></i>
						<span id="cart-count" class="label label-warning">
						@if (isset($currentCartUser))
							{{ $currentCartUser->products->count() }}
						@else
							0
						@endif
						</span>
					</a>
					<ul id="products-cart" class="dropdown-menu dropdown-alerts">
						@if (isset($currentCartUser))
							@foreach ($currentCartUser->products as $product)
							<li class="li">
								<div class="row">
									<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
										<a href="{{ route('product.show', $product->id) }}"> 
											<i class="fa fa-check fa-2x"></i> {{ $product->name }}
										</a>
									</div>
									<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
										{{ $product->pivot->quantity }}
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<span class="pull-right text-muted small">
											<a href="http://tienda-online.local/en/cart/api/cart-delete-ajax/73" class="delete-from-cart">
												<i class="fa fa-minus-circle fa-2x"></i>
											</a>
										</span>
									</div>
								</div>
							</li>
							@endforeach
						@endif
						<li class="divider"></li>
						<li>
							<div class="text-center link-block">
								<a href="http://tienda-online.local/en/cart/show/4">
									<strong>Más Detalles</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<i class="fa fa-check-square-o fa-lg"></i>
						<span id="wishlist-count" class="label label-primary">
							0
						</span>
					</a>
					<ul id="products-wishlist" class="dropdown-menu dropdown-alerts">
						<li class="divider"></li>
						<li>
							<div class="text-center link-block">
								<a href="http://tienda-online.local/en/wistlist/api/wistlist">
									<strong>Más Detalles</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
				<li><a href="#">{{\Auth::user()->username}}</a></li>
			</ul>
			@else 	
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('/auth/login') }}">Login</a></li>
			</ul>
			@endif
			
			<!--<div class="col-sm-6 col-md-6 col-lg-6 col-lg-push-2">
				<form class="navbar-form" style="width:80%" role="search">
					<div style="display:table;" class="input-group">
						<input type="text" autofocus="autofocus" autocomplete="off" placeholder="Search Here" name="search" style="" class="form-control">
						<span style="width: 1%;" class="input-group-addon">
							<span class="glyphicon glyphicon-search"></span>
						</span>
					</div>
				</form>
			</div>-->
			<form id="adv-search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Buscar">
					<div class="input-group-btn">
						<div class="btn-group" role="group">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</nav>