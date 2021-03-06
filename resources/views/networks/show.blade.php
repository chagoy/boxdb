@extends ('layouts.app')

@section ('content')
<div class="uk-section-xsmall uk-section-secondary">
	<div class="uk-container">
		<h1 class="uk-heading-line uk-text-center"><span>{{ $network->name }}</span></h1>
		<p>Total Cards: {{ count($network->cards) }}<span class="uk-align-right">Average: {{ number_format(array_sum($views->average) / count($views->average)) }} Total: {{ number_format(array_sum($views->average)) }}</span></p>
	</div>
</div>
<div class="uk-container">
	@if (count($network->cards))
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
				@foreach ($network->cards->sortByDesc('date') as $card)
					<tr>
						<td><a href="/cards/{{ $card->id }}">{{ $card->format_date }}</a></td>
						<td><a href="{{ $card->fights[0]->asideBoxer->path() }}">{{ $card->fights[0]->asideBoxer->full_name}}</a></td>
						<td><a href="{{ $card->fights[0]->bsideBoxer->path() }}">{{ $card->fights[0]->bsideBoxer->full_name}}</a></td>
						<td>{{ $card->average }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<p>No cards to display</p>
	@endif
	<div>
		<h3 class="uk-text-center">All Time Viewers Graph</h3>
		<network-chart :networknums="{{ json_encode($networknums) }}" 
					:network="{{ json_encode($network) }}"
					:alltime="{{ json_encode($allViews->coordinates) }}" 
					:totaldates="{{ json_encode($views->dates) }}" 
					:width="500" 
					:height="200"></network-chart>
	</div>
</div>
@endsection

