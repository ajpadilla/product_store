@extends('layouts.content')

@section('title', 'Profile user')

@section('content')
<h1>Edit Profile</h1>
<hr>
<div class="row">
	<!-- left column -->
	<div class="col-md-3">
		<div class="text-center">
			@if ($user->hasPhotos())
				<img src="{{ asset('$user->first_photo->complete_thumbnail_path') }}" class="avatar img-circle" alt="avatar">
			@else
				<img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
			@endif
		</div>
	</div>

	<!-- edit form column -->
	<div class="col-md-9 personal-info">
		@include('layouts.partials._errors')
		@include('layouts.partials._messages')
		<h3>Personal info</h3>
		{!! Form::open(['route' => 'user.update-profile', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true, 'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
			{!! Form::label('first_name', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				{!! Form::text('first_name',$user->first_name, ['class' => 'form-control', 'placeholder' => 'Firs Name']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('last_name', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				{!! Form::text('last_name',$user->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('email', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				{!! Form::email('email',$user->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('username', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				{!! Form::text('username',$user->username, ['class' => 'form-control', 'placeholder' => 'User name']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('address', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				{!!  Form::textarea('address' , $user->address , ['class' => 'form-control', 'placeholder' => 'Addres']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('post_code', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				{!! Form::text('post_code',$user->post_code, ['class' => 'form-control', 'placeholder' => 'Post Code']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('phone', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				{!! Form::text('phone',$user->phone, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('country', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				{!! Form::select('country_id', $countries, $user->country_id, ['class' => 'form-control', 'placeholder' => 'Country', 'id' => '']); !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('photo', '', ['class' => 'col-lg-3 control-label']) !!}
			<div class="col-lg-8">
				<h6>Upload a different photo...</h6>
				{!! Form::file('photo','', ['class' => 'form-control', 'placeholder' => 'Photo']) !!}
			</div>
		</div>
		 <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
				{!! Form::submit('Save Changes',['class' =>'btn btn-primary']) !!}
            </div>
          </div>
		{!! Form::close() !!}
		
	</div>
</div>
@endsection