@extends ('layouts.app')

@section ('content')
	<div class="uk-container">
		<table class="uk-table uk-table-striped uk-table-hover" id="datatable">
			<thead>
				<tr>
					<th>Date</th>
					<th>Network</th>
					<th>A-Side</th>
					<th>B-Side</th>
					<th>Viewers</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cards->sortByDesc('date') as $card)
					<tr>
						<td><a href="/cards/{{ $card->id }}">{{ $card->format_date }}</a></td>
						<td><a href="/networks/{{ $card->network->slug }}">{{ $card->network->name }}</a></td>
						@foreach ($card->fights as $fight)
							<td><a href="/boxers/{{ $fight->asideBoxer->slug }}">{{ $fight->asideBoxer->first_name . ' ' . $fight->asideBoxer->last_name }}</a></td>
							<td><a href="/boxers/{{ $fight->asideBoxer->slug }}">{{ $fight->bsideBoxer->first_name . ' ' . $fight->bsideBoxer->last_name }}</a></td>
							<td>{{ number_format($fight->views->average) }}</td>
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<a href="#" uk-totop uk-scroll></a>
@endsection