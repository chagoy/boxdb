@extends ('layouts.app')

@section ('content')
	<div class="uk-section-xsmall uk-section-secondary">
		<div class="uk-container">
			<h1 class="uk-heading-line uk-text-center"><span>{{ $boxer->full_name }}</span></h1>
			<p>{{ $boxer->verbose_record }}<span class="uk-align-right">Total: {{ $boxer->total_viewers['sum'] }} Average: {{ $boxer->total_viewers['average'] }}<span></p>
			{{-- <upload-image></upload-image> --}}
			<form action="/boxers/{{ $boxer->slug }}/upload" method="post" enctype="multipart/form-data">
				@csrf
	            <input type="file" type="file" accept="image/*" name="image">
	            <button type="submit">submit</button>
	        </form>
       {{--  @if ($boxer->image_path)
			<img src="{{ asset($boxer->image_path) }}" alt="">
        @endif --}}
    	</div>
	</div>
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
				@foreach ($allFights as $fight) 
					<tr>
						<td>{{ $fight->formatted_date }}</td>
						<td><a href="{{ $fight->network->path() }}">{{ $fight->network->name }}</a></td>
						<td><a href="{{ $fight->asideBoxer->path() }}">{{ $fight->asideBoxer->full_name }}</a></td>
						<td><a href="{{ $fight->bsideBoxer->path() }}">{{ $fight->bsideBoxer->full_name }}</a></td>
						<td>{{ number_format($fight->views->average) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@if (count($allFights) > 2)
			<h3>Average All-Time Viewers</h3>
			<boxer-chart 
					:boxer="{{ json_encode($boxer->full_name) }}"
					:boxernums="{{ json_encode($boxernums) }}"
					:alltime="{{ json_encode($allViews->coordinates)}}"
					:totaldates="{{ json_encode($allViews->totalDates) }}"
					:width="500" 
					:height="200"></boxer-chart>
		@else 
			<p>There aren't enough fights in the database to render a graph.</p>
		@endif

	</div>
@endsection