<h1>We've admitted your income</h1>
<section>
	<h2>Hello {{ $user->first_name }} {{ $user->last_name }} </h2>
	<h3>Now you can access your registration data to the system</h3>
	<fieldset>
		<p><em>Username</em> <strong>{{ $user->username }}</strong></p>
		<p><em>Email</em> <strong>{{ $user->email }}</strong></p>
		<p><em>Post Code</em> <strong>{{ $user->post_code }}</strong></p>
		<p><em>Phone</em> <strong>{{ $user->phone }}</strong></p>
		<p><em>Country</em> <strong>{{ $user->country->name }}</strong></p>
		<p><em>Address</em> <strong>{{ $user->address }}</strong></p>
	</fieldset>
</section>