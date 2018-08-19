@extends ('layouts.app')

@section ('content')
	<div class="uk-section-xsmall uk-section-secondary">
		<div class="uk-container">
			<h1 class="uk-heading-line uk-text-center">{{ $anetwork->name }} vs {{ $bnetwork->name }}</h1>
			<h3 class="uk-text-center">Head-to-Head Comparison</h3>
		</div>
	</div>
	<table class="uk-table uk-table-striped uk-table-hover sortingTable" id="sortTable">
		<thead>
			<tr>
				<th>Date</th>
				<th>Network</th>
				<th>A-Side</th>
				<th>B-Side</th>
				<th>Viewers</th>
			</tr>
	  </thead>			
			@foreach ($anetwork->cards as $card)
				<tr>
					<td><a href="/cards/{{ $card->id }}">{{ $card->format_date }}</a></td>
					<td>{{ $anetwork->name }}</td>
					<td><a href="{{ $card->fights[0]->asideBoxer->path() }}">{{ $card->fights[0]->asideBoxer->full_name }}</a></td>
					<td><a href="{{ $card->fights[0]->bsideBoxer->path() }}">{{ $card->fights[0]->bsideBoxer->full_name }}</a></td>
					<td>{{ $card->fights[0]->views->average }}</td>
				</tr>
			@endforeach
			@foreach ($bnetwork->cards as $card)
				<tr>
					<td><a href="/cards/{{ $card->id }}">{{ $card->format_date }}</a></td>
					<td>{{ $bnetwork->name }}</td>
					<td><a href="{{ $card->fights[0]->asideBoxer->path() }}">{{ $card->fights[0]->asideBoxer->full_name }}</a></td>
					<td><a href="{{ $card->fights[0]->bsideBoxer->path() }}">{{ $card->fights[0]->bsideBoxer->full_name }}</a></td>
					<td>{{ $card->fights[0]->views->average }}</td>
					</tr>
			@endforeach
		</table>

	<compare-chart
		:dates="{{ json_encode($dates) }}"
		:anetwork="{{ json_encode($anetwork) }}"
		:bnetwork="{{ json_encode($bnetwork) }}"
		:anums="{{ json_encode($aNums) }}"
		:bnums="{{ json_encode($bNums) }}"
		:width="500" 
		:height="200"
	></compare-chart>
@endsection