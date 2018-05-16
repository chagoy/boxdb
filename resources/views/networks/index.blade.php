@extends ('layouts.app')

@section ('content')
	<ul>
		@foreach ($networks as $network)
			<li><a href="{{ $network->path() }}">{{ $network->name }}</a></li>
		@endforeach
	</ul>
@endsection