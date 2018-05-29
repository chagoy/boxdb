@extends ('layouts.app')

@section ('content')
	<div class="uk-container">
		<ul>
			@foreach ($venues as $venue)
				<li><a href="{{ $venue->path() }}">{{ $venue->venue }}</a></li>
			@endforeach
		</ul>
	</div>
@endsection