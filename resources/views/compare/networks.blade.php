@extends ('layouts.app')

@section ('content')
	<div class="uk-section-xsmall uk-section-secondary">
		<div class="uk-container">
			<h1 class="uk-heading-line uk-text-center">{{ $anetwork->name }} vs {{ $bnetwork->name }}</h1>
			<h3 class="uk-text-center">Head-to-Head Comparison</h3>
		</div>
	</div>

	@foreach ($anetwork->cards as $card)
		<p><a href="/cards/{{ $card->id }}">{{ $card->format_date }}</a><a href="{{ $card->fights[0]->asideBoxer->path() }}">{{ $card->fights[0]->asideBoxer->full_name }}</a> vs <a href="{{ $card->fights[0]->bsideBoxer->path() }}">{{ $card->fights[0]->bsideBoxer->full_name }}</a></p>
	@endforeach

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