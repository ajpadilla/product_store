<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	@include('layouts.partials._css')
</head>
<body>
	<div class="container-fluid">
		@yield('main-content')
	</div>
	@include("layouts.partials._js")
</body>
</html>