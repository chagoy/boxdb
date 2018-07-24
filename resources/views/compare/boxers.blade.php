@extends ('layouts.app')

@section ('content')
	<div class="uk-section-xsmall uk-section-secondary">
		<div class="uk-container">
			<h1 class="uk-heading-line uk-text-center">{{ $aside->full_name }} vs {{ $bside->full_name }}</h1>
			<h3 class="uk-text-center">Head-to-Head Comparison</h3>
		</div>
	</div>

	<compare-chart
		:dates="{{ json_encode($dates) }}"
		:aside="{{ json_encode($aside) }}"
		:bside="{{ json_encode($bside) }}"
		:asidenums="{{ json_encode($asidenums) }}"
		:bsidenums="{{ json_encode($bsidenums) }}"
		:width="500" 
		:height="200"
	></compare-chart>
@endsection