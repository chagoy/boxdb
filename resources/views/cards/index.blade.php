@extends ('layouts.app')

@section ('content')
	<div class="uk-container">
		<table class="uk-table uk-table-striped uk-table-hover">
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
				@foreach ($cards as $card)
					<tr>
						<td>Date</td>
						<td>{{ $card->network->name }}</td>
						@foreach ($card->fights as $fight)
							<td>{{ dd($fight->aside->first_name) }}</td>
							<td>{{ $fight->bside->last_name }}</td>
						@endforeach
						<td>{{ $card->fights->views->average }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection