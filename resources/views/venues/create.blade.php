@extends ('layouts.app')

@section ('content')
	<div class="uk-container">
		<h1>Add a new venue to the database</h1>
		@if (session('status'))
			<div class="uk-alert-primary" uk-alert>
				<a class="uk-alert-close" uk-close></a>
				<p>{{ session('status') }}</p>
			</div>
		@endif
		@include('venues.form')
	</div>
@endsection