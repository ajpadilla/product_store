@extends('layouts.main')

@section('title', 'Add new user')

@section('content')
	<h1 class="page-header">Add new user</h1>
	{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true, 'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data']) !!}
		{!! csrf_field() !!}
		<div class="form-group">
			{!! Form::label('first_name', 'First Name', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::text('first_name','First Name', ['class' => 'form-control']) !!}
			</div>
		</div>
	{!! Form::close() !!}
@endsection