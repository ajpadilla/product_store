<h1>We've admitted your income</h1>
<section>
	<h2>Hello {{ $user->first_name }} {{ $user->last_name }} </h2>
	<h3>Now you can access your registration data to the system</h3>
	<fieldset>
		<p><em>Name</em> <strong>{{ $user->username }}</strong></p>
		<p><em>Email</em> <strong>{{ $user->email }}</strong></p>
		<p><em>Post Code</em> <strong>{{ $user->codigo_postal }}</strong></p>
		<p><em>Phone</em> <strong>{{ $user->telefono_fijo }}</strong></p>
		<p><em>Country</em> <strong>{{ $user->provincia_id }}</strong></p>
		<p><em>Address</em> <strong>{{ $user->direccion }}</strong></p>
	</fieldset>
</section>