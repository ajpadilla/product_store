@extends('layouts.main')

@section('title', 'Add new user')

@section('content')
	<h1 class="page-header">Add new user</h1>
	{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true, 'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data']) !!}
		{!! csrf_field() !!}
		<div class="form-group">
			{!! Form::label('first_name', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::text('first_name','', ['class' => 'form-control', 'placeholder' => 'Firs Name']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('last_name', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::text('last_name','', ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('email', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::email('email','', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('username', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::text('username','', ['class' => 'form-control', 'placeholder' => 'User name']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('password', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('password_confirmation', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm password']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('photo', '', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::file('photo','', ['class' => 'form-control', 'placeholder' => 'Photo']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Agregar!',['class' =>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@endsection