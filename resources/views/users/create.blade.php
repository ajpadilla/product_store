@extends('layouts.main')

@section('title', 'Add new user')

@section('content')
	{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true, 'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data']) !!}
		{!! csrf_field() !!}
		<div class="form-group">
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name','First Name',['class' => 'form-control']) }}
		</div>
	{!! Form::close() !!}
@endsection