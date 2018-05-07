@extends ('layouts.app')

@section ('content')
	<div class="uk-container">
		<p class="uk-text-lead">add a boxer</p>

		@if (session('status'))
			<div class="uk-alert-primary" uk-alert>
				<a class="uk-alert-close" uk-close></a>
				<p>{{ session('status') }}</p>
			</div>
		@endif

		@include ('boxers.form')
	</div>
@endsection