@extends('layouts.content')

@section('title', 'List Users')

@section('content')
	<h1 class="page-header">List of users</h1>
	<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
            	<th>Photo</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Addres</th>
				<th>Post Code</th>
                <th>Country</th>
				<th>Phone</th>
                <th>Active</th>
                <th>Role</th>
                <!--<th>Actions</th>-->
            </tr>
        </thead>
    </table>
@endsection

@section('scripts')
	<script type="text/javascript">
		$(function(){
			$('#users-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('api.datatables.users') !!}',
		        columns: [
		            {data: 'photo', name: 'photo', orderable: false, searchable: false},
		            {data: 'first_name', name: 'first_name'},
		            {data: 'last_name', name: 'last_name'},
		            {data: 'username', name: 'username'},
		            {data: 'address', name: 'address'},
		            {data: 'post_code', name: 'post_code'},
		            {data: 'country_id', name: 'country_id', orderable: false, searchable: false},
		            {data: 'phone', name: 'phone'},
		            {data: 'active', name: 'active'},
		            {data: 'role', name: 'role'},
		            /*{data: 'action', name: 'action', orderable: false, searchable: false}*/
		        ]
		    });
		});
	</script>
@endsection