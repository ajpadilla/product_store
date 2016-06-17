@extends('layouts.content')

@section('title', 'List classification')

@section('content')
	<h1 class="page-header">List of classifications for productss</h1>
	<table class="table table-bordered" id="classification-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection

@section('scripts')
	<script type="text/javascript">
		$(function(){
			$('#classification-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('api.datatables.classification') !!}',
		        columns: [
		            { data: 'name', name: 'name' },
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
		});
	</script>
@endsection