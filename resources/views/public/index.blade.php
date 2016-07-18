@extends('layouts.main')

@section('main-content')
@include("layouts.partials._header")
<div class="row">
	@include('layouts.partials._errors')
	@include('layouts.partials._messages')
	<h1>Pagina Principal</h1>
</div>
@endsection