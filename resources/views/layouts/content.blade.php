@extends('layouts.main')

@section('main-content')
@include("layouts.partials._header")
<div class="row">
	<div class="col-sm-3 col-md-2">
		@include('layouts.partials._sidebar')
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div id="content">
			@yield('content')
		</div>
	</div>
</div>
@endsection

@include('carts.partials._product-cart-tpl')
