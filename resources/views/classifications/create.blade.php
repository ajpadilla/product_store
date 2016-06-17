@extends('layouts.content')

@section('title', 'Add new user')

@section('content')
	<h1 class="page-header">Add new classification for products</h1>
	@include('layouts.partials._errors')
	@include('layouts.partials._messages')
	{!! Form::open(['route' => 'classification.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) !!}
		{!! csrf_field() !!}
		<div class="form-group">
			{!! Form::label('name', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-2">
				{!! Form::submit('Add',['class' =>'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
@endsection