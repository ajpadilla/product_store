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
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<i class="fa fa-shopping-cart fa-lg"></i>
						<span id="cart-count" class="label label-warning">
							0
						</span>
					</a>
					<ul id="products-cart" class="dropdown-menu dropdown-alerts">
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
				<li><a href="#">Settings</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="/auth/logout">Logout</a></li>
			</ul>
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