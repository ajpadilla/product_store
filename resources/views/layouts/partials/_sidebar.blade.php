<div class="nav-side-menu">
	<div class="brand">Brand Logo</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	<div class="menu-list">
		<ul id="menu-content" class="menu-content collapse in">
			<li>
				<a href="{{ url('/dashboard') }}">
					<i class="fa fa-dashboard fa-lg"></i> Dashboard
				</a>
			</li>
			@if (\Auth::user()->isAdmin())
			<li  data-toggle="collapse" data-target="#users" class="collapsed active">
				<a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>Users<span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="users">
				<li class=""><a href="{{ url('user/list') }}">Index</a></li>
				<li class=""><a href="{{ url('user/create') }}">Create</a></li>
			</ul>

			<li data-toggle="collapse" data-target="#classifications" class="collapsed">
				<a href="#"><i class="fa fa-plus-circle"></i> Classification <span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="classifications">
				<li><a href="{{ url('classification/list') }}">Index</a></li>
				<li><a href="{{ url('classification/create') }}">Create</a></li>
			</ul>

			<li data-toggle="collapse" data-target="#products" class="collapsed">
				<a href="#"><i class="fa fa-plus-circle"></i> Product <span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="products">
				<li><a href="{{ url('product/list') }}">Index</a></li>
				<li><a href="{{ url('product/create') }}">Create</a></li>
			</ul>
			@endif
			<li data-toggle="collapse" data-target="#invoices" class="collapsed">
				<a href="#"><i class="fa fa-plus-circle"></i> Invoices <span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="invoices">
				<li><a href="{{ url('invoice/list') }}">Index</a></li>
			</ul>
		</ul>
	</div>
</div>