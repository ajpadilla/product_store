@extends('layouts.main')

@section('title', 'Reset Password')

@section('main-content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		@include('layouts.partials._errors')
		@include('layouts.partials._messages')
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Reset Password</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['url' => '/password/email', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'accept-charset' => 'UTF-8']) !!}
					{!! csrf_field() !!}
					<fieldset>
						<div class="form-group">
							{!! Form::email('email','', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
						</div>
						{!! Form::submit('Reset',['class' =>'btn btn-lg btn-success btn-block']) !!}
					</fieldset>
				{!! Form::close() !!}
				<hr/>
				<a href="{{ url('auth/login') }}">Login</a>
			</div>
		</div>
	</div>
</div>
@endsection
