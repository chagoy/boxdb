@extends ('layouts.app')

@section ('content')
	<div class="uk-container">
		<p class="uk-text-lead">Add a card to the database</p>
		@include ('cards.form')
	</div>
@endsection