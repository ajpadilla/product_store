@extends('layouts.content')

@section('title', 'Edit new classification')

@section('content')
	<h1 class="page-header">Edit classification for products</h1>
	@include('layouts.partials._errors')
	@include('layouts.partials._messages')
	{!! Form::model($classification, ['route' => ['classification.update', $classification->id]]) !!}
		{!! csrf_field() !!}
		<div class="form-group">
			{!! Form::label('name', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::text('name',$classification->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-2">
				{!! Form::submit('Edit',['class' =>'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
@endsection