@extends('layouts.main')

@section('title', 'Login')

@section('main-content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		@include('layouts.partials._errors')
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Registrar via site</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true, 'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data']) !!}
					{!! csrf_field() !!}
					<div class="form-group">
						{!! Form::text('first_name','', ['class' => 'form-control', 'placeholder' => 'Firs Name']) !!}
					</div>
					<div class="form-group">
						{!! Form::text('last_name','', ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
					</div>
					<div class="form-group">
						{!! Form::email('email','', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
					</div>
					<div class="form-group">
						{!! Form::text('username','', ['class' => 'form-control', 'placeholder' => 'User name']) !!}
					</div>
					<div class="form-group">
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
					</div>
					<div class="form-group">
						{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm password']) !!}
					</div>
					<div class="form-group">
						{!!  Form::textarea('address' , null , ['class' => 'form-control', 'placeholder' => 'Addres']) !!}
					</div>
					<div class="form-group">
						{!! Form::text('post_code','', ['class' => 'form-control', 'placeholder' => 'Post Code']) !!}
					</div>
					<div class="form-group">
						{!! Form::select('country_id', [], null, ['class' => 'form-control', 'placeholder' => 'Country', 'id' => 'countries_register']); !!}
					</div>
					<div class="form-group">
						{!! Form::file('photo','', ['class' => 'form-control', 'placeholder' => 'Photo']) !!}
					</div>
					{!! Form::submit('Registrar',['class' =>'btn btn-lg btn-success btn-block']) !!}
					<div class="login-register">
				    	<a href="/auth/login">Login</a>
				    </div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection