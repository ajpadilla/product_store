@extends('layouts.content')

@section('title', 'List products')

@section('content')
	<h1 class="page-header">List of products</h1>
	<table class="table table-bordered" id="products-table">
        <thead>
            <tr>
            	<th>Photo</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Mark</th>
                <th>Active</th>
                <th>Classification</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
@endsection

@include('products.show')
@include('products.partials._form_show-tpl')

@section('scripts')
	<script type="text/javascript">
		$(function(){
			$('#products-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('api.datatables.product') !!}',
		        columns: [
		            {data: 'photo', name: 'photo', orderable: false, searchable: false},
		            {data: 'name', name: 'name' },
		            {data: 'description', name: 'description' },
		            {data: 'quantity', name: 'quantity' },
		            {data: 'price', name: 'price' },
		            {data: 'mark', name: 'mark' },
		            {data: 'active', name: 'active' },
		            {data: 'classification', name: 'classification', orderable: false, searchable: false },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@endsection