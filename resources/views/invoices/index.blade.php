@extends('layouts.content')

@section('title', 'List invoices')

@section('content')
	<h1 class="page-header">List of invoices</h1>
	<table class="table table-bordered" id="invoices-table">
        <thead>
            <tr>
            	<th>Date</th>
                <th>client</th>
                <th>Address</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
@endsection

@section('scripts')
	<script type="text/javascript">
		$(function(){
			$('#invoices-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('api.datatables.invoice') !!}',
		        columns: [
		            {data: 'date', name: 'date' },
		            {data: 'client_id', name: 'client_id', orderable: false, searchable: false },
		            {data: 'address', name: 'address', orderable: false, searchable: false },
		            {data: 'total', name: 'total' },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@endsection