@extends ('layouts.app')

@section ('content')
	<div class="uk-container">
		<h4>featured fighters</h4>
		<div class="uk-child-width-1-3@m uk-grid-small-uk-grid-match uk-grid-match" uk-grid>
			<div>
				<div class="uk-card uk-card-secondary uk-card-body">
					<h3 class="uk-card-title"><a href="/boxers/{{ $featured[0]->slug }}">{{ $featured[0]->full_name }}</a></h3>
					<p>{{ $featured[0]->distinction }}</p>
					<p>{{ $featured[0]->weight->division }}, {{ $featured[0]->wins }}({{ $featured[0]->knockouts }})-{{ $featured[0]->losses }}@if ($featured[0]->draws)-{{ $featured[0]->draws }} @endif</p>
				</div>
			</div>
			<div>
				<div class="uk-card uk-card-secondary uk-card-body">
					<h3 class="uk-card-title"><a href="/boxers/{{ $featured[1]->slug }}">{{ $featured[1]->full_name }}</a></h3>
					<p>{{ $featured[1]->distinction }}</p>
					<p>{{ $featured[1]->weight->division }}, {{ $featured[1]->wins }}({{ $featured[1]->knockouts }})-{{ $featured[1]->losses }}@if ($featured[1]->draws)-{{ $featured[1]->draws }} @endif</p>
				</div>
			</div>
			<div>
				<div class="uk-card uk-card-secondary uk-card-body">
					<h3 class="uk-card-title"><a href="/boxers/{{ $featured[2]->slug }}">{{ $featured[2]->full_name }}</a></h3>
					<p>{{ $featured[2]->distinction }}</p>
					<p>{{ $featured[2]->weight->division }}, {{ $featured[2]->wins }}({{ $featured[2]->knockouts }})-{{ $featured[2]->losses }}@if ($featured[2]->draws)-{{ $featured[2]->draws }} @endif</p>
				</div>
			</div>
		</div>
		<h4>the rest of the jabronis</h4>
		@foreach ($boxers as $boxer) 
			<a href="/boxers/"{{ $boxer->path }}>{{ $boxer->first_name }} {{ $boxer->last_name }}.</a>
		@endforeach
	</div>
@endsection