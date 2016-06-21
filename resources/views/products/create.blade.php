@extends('layouts.content')

@section('title', 'Add new product')

@section('content')
	<h1 class="page-header">Add new product</h1>
	@include('layouts.partials._errors')
	@include('layouts.partials._messages')
	{!! Form::open(['route' => 'product.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) !!}
	{!! csrf_field() !!}
	<div class="form-group">
		{!! Form::label('name', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('description', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!!  Form::textarea('description' , null , ['class' => 'form-control', 'placeholder' => 'Description']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('quantity', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('quantity','', ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('price', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('price','', ['class' => 'form-control', 'placeholder' => 'Price']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('Status', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::radio('active', '1', true) !!} Active
			{!! Form::radio('active', '0', false) !!} Desactive
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('mark', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('mark','', ['class' => 'form-control', 'placeholder' => 'Mark']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('classification', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::select('classification_id', [], null, ['class' => 'form-control', 'placeholder' => 'Classification', 'id' => 'classification_product']); !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-2">
			{!! Form::submit('Add',['class' =>'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
@endsection