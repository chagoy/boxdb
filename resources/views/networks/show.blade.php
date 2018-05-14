@extends ('layouts.app')

@section ('content')
<div class="uk-section uk-section-secondary">
	<div class="uk-container">
		<h1 class="uk-heading-line uk-text-center"><span>{{ $network->name }}</span></h1>
	</div>
</div>
<div class="uk-container">
	<table class="uk-table uk-table-striped uk-table-hover">
		<legend>Available Cards For {{ $network->name }}</legend>
		<thead>
			<tr>
				<th>Date</th>
				<th>A-Side</th>
				<th>B-Side</th>
				<th>Viewers</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($network->cards as $card)
				<tr>
					<td><a href="/cards/{{ $card->id }}">{{ $card->format_date }}</a></td>
					<td>{{ $card->fights[0]->asideBoxer->full_name}}</td>
					<td>{{ $card->fights[0]->bsideBoxer->full_name}}</td>
					<td>{{ number_format($card->fights[0]->views->average) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

