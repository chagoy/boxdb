@extends ('layouts.app')

@section ('content')
	<div class="uk-child-width-1-4@s uk-grid-match" uk-grid>
		@foreach ($venues as $venue)
			<div>
				<div class="uk-card uk-card-hover uk-card-body uk-card-default">
					<h3 class="uk-card-title"><a href="{{ $venue->path() }}">{{ $venue->venue }}</a></h3>
					<p>{{ $venue->location }}</p>
					<p>{{ count($venue->cards) }} cards in the database</p>
				</div>
			</div>
		@endforeach
	</div>
@endsection