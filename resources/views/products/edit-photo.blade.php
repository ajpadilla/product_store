@extends('layouts.content')

@section('title', 'Edit photos product')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h1 class="pagetitle nodesc"> Edit photos to product {{ $product->name }}</h1>
			</div>
			<div class="ibox-content">
				<div class="row">
					<section id="content" class=" col-lg-offset-2 col-lg-10">
						<div id="actions" class="row">
							<div class="col-lg-7">
								<!-- The fileinput-button span is used to style the file input field as button -->
								<button id="addPhoto" class="btn btn-success fileinput-button dz-clickable">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Add Photo</span>
								</button>
								<button type="submit" class="btn btn-primary start">
									<i class="glyphicon glyphicon-upload"></i>
									<span>Start</span>
								</button>
								<button type="reset" class="btn btn-warning cancel">
									<i class="glyphicon glyphicon-ban-circle"></i>
									<span>Cancel</span>
								</button>
									{{--{{ Form::open(['route' => 'products.index', 'method' => 'get']) }}
										<button type="submit" href="{{ route('products.index') }}" class="btn-alert">
											<span>Lista de Productos</span>
										</button>
										{{ Form::close() }}--}}
									</div>
									<div class="col-lg-5">
										<!-- The global file processing state -->
										<span class="fileupload-process">
											<div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
												<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
											</div>
										</span>
									</div>
								</div>
								<section id="previews" class="row" class="files">
									<div id="template" class="row">
										<!-- This is used as the file preview template -->
										<div class="col-lg-1">
											<span class="preview"><img data-dz-thumbnail /></span>
										</div>
										<div class="col-lg-4">
											<p class="name" data-dz-name></p>
											<strong class="error text-danger" data-dz-errormessage></strong>
										</div>
										<div class="col-lg-2">
											<p class="size" data-dz-size></p>
											<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
												<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
											</div>
										</div>
										<div class="col-lg-5">
											<button class="btn btn-primary start">
												<i class="glyphicon glyphicon-upload"></i>
												<span>Add Photo</span>
											</button>
											<button data-dz-remove class="btn btn-warning cancel">
												<i class="glyphicon glyphicon-ban-circle"></i>
												<span>Cancel</span>
											</button>
											<button data-dz-remove class="btn btn-danger delete">
												<i class="glyphicon glyphicon-trash"></i>
												<span>Delete</span>
											</button>
										</div>
									</div>
								</section>
						</section><!-- content -->
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}
@endsection

@section('scripts')
@stop