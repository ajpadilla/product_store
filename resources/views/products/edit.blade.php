@extends('layouts.content')

@section('title', 'Edit product')

@section('content')
	<h1 class="page-header">Edit product</h1>
	@include('layouts.partials._errors')
	@include('layouts.partials._messages')
	{!! Form::open(['route' => ['product.update', $product->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) !!}
	{!! csrf_field() !!}
	<div class="form-group">
		{!! Form::label('name', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('name',$product->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('description', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!!  Form::textarea('description' , $product->description , ['class' => 'form-control', 'placeholder' => 'Description']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('quantity', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('quantity', $product->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('price', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('Status', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::radio('active', '1', ($product->active == 'Yes')) !!} Active
			{!! Form::radio('active', '0', ($product->active == 'No')) !!} Desactive
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('mark', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::text('mark', $product->mark, ['class' => 'form-control', 'placeholder' => 'Mark']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('classification', '', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-4">
			{!! Form::select('classification_id', $classifications, $product->classification_id, ['class' => 'form-control', 'placeholder' => 'Classification', 'id' => 'classification_product_edit']); !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-2">
			{!! Form::submit('Update',['class' =>'btn btn-primary']) !!}
		</div>
	</div>
	{!! Form::close() !!}
@endsection