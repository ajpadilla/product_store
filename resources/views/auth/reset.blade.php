@extends('layouts.main')

@section('title', 'Reset Password Form')

@section('main-content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		@include('layouts.partials._errors')
		{{-- @include('layouts.partials._messages') --}}
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Reset Password Form</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['url' => '/password/reset', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'accept-charset' => 'UTF-8']) !!}
					<fieldset>
						<input type="hidden" name="token" value="{{ $token }}">
						<div class="form-group">
							{!! Form::email('email','', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
						</div>
						<div class="form-group">
							{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
						</div>
						<div class="form-group">
							{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Confirmation']) !!}
						</div>
						{!! Form::submit('Reset',['class' =>'btn btn-lg btn-success btn-block']) !!}
					</fieldset>
				{!! Form::close() !!}
				<hr/>
			</div>
		</div>
	</div>
</div>
@endsection