<h1>A new user is registered</h1>
<section>
	<h2>Data of {{ $user->first_name }}  {{ $user->last_name }}</h2>
	<fieldset>
		<p><em>Username</em> <strong>{{ $user->username }}</strong></p>
		<p><em>Email</em> <strong>{{ $user->email }}</strong></p>
		<p><em>Post Code</em> <strong>{{ $user->post_code }}</strong></p>
		<p><em>Phone</em> <strong>{{ $user->phone }}</strong></p>
		<p><em>Country</em> <strong>{{ $user->country->name }}</strong></p>
		<p><em>Address</em> <strong>{{ $user->address }}</strong></p>
	</fieldset>
	<h3>You can follow this link to activate the user: {!! link_to_route('activate_user_path', 'Enabled User', ['id', $user->id]) !!}</h3>
	<p>or copy and paste the following link into your browser: {{ route('activate_user_path', ['id', $user->id]) }} </p>
</section>