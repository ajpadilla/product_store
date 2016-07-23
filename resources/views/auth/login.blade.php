@extends('layouts.main')

@section('title', 'Login')

@section('main-content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		@include('layouts.partials._errors')
		{{-- @include('layouts.partials._messages') --}}
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Login via site</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['url' => 'auth/login', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'accept-charset' => 'UTF-8']) !!}
					{!! csrf_field() !!}
					<fieldset>
						<div class="form-group">
							{!! Form::email('email','', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
						</div>
						<div class="form-group">
							{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
						</div>
						<div class="checkbox">
							<label>
								{!! Form::checkbox('remember', 'Remember Me') !!} Remember Me
							</label>
						</div>
						{!! Form::submit('Login',['class' =>'btn btn-lg btn-success btn-block']) !!}
					</fieldset>
				{!! Form::close() !!}
				<hr/>
				<center><h4>OR</h4></center>
				<a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-facebook btn-block">Login Facebook</a>
			</div>
		</div>
	</div>
</div>
@endsection
