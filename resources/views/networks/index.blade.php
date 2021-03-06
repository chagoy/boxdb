@extends ('layouts.app')

@section ('content')
	<div class="uk-child-width-1-4@s uk-grid-match" uk-grid>
		@foreach ($networks as $network)
			<div>
				<div class="uk-card uk-card-hover uk-card-body uk-card-default">
					<h3 class="uk-card-title"><a href="{{ $network->path() }}">{{ $network->name }}</a></h3>
					<p>{{ count($network->cards) }} cards in the database</p>
				</div>
			</div>
		@endforeach
	</div>
@endsection