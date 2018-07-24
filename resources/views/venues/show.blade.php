@extends ('layouts.app')

@section ('content')
	<div class="uk-section-xsmall uk-section-secondary">
		<div class="uk-container">
			<h1 class="uk-heading-line uk-text-center"><span>{{ $venue->venue }}</span></h1>
			<h3 class="uk-text-center">{{ $venue->city }}, {{ $venue->state }}, {{ $venue->country }}</h3>
		</div>
	</div>
	<div class="uk-container">
		@if (count($venue->cards))
		<table class="uk-table uk-table-striped uk-table-hover">
			<thead>
				<tr>
					<th>Date</th>
					<th>A-Side</th>
					<th>B-Side</th>
					<th>Viewers</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($venue->cards->sortByDesc('date') as $card)
					<tr>
						<td><a href="/cards/{{ $card->id }}">{{ $card->format_date }}</a></td>
						<td><a href="{{ $card->fights[0]->asideBoxer->path() }}">{{ $card->fights[0]->asideBoxer->full_name}}</a></td>
						<td><a href="{{ $card->fights[0]->bsideBoxer->path() }}">{{ $card->fights[0]->bsideBoxer->full_name}}</a></td>
						<td>{{ $card->average }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
@endsection