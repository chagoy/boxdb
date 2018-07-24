@extends ('layouts.app')

@section ('content')

<div class="uk-section-xsmall uk-section-secondary">
	<div class="uk-container">
		<h1 class="uk-heading-line uk-text-center"><span>{{ $card->fights[0]->asideBoxer->full_name }} vs {{ $card->fights[0]->bsideBoxer->full_name }}</span></h1>
		<h3 class="uk-text-center">{{ $card->format_date }} - <a href="{{ $card->venue->path() }}">{{ $card->venue->venue }}</a> - <a href="{{ $network->path() }}">{{ $network->name }}</a></h3>
		<h3 class="uk-text-center">Average Viewers: {{ $card->average }}</h3>
	</div>
</div>

<div class="uk-container">
	<div class="uk-section">
		<div class="uk-container">
			<h3>The Fights</h3>
			<div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
				@foreach ($card->fights as $fight)
					<div>
						<p class="uk-text-lead">@if ($fight->main_event)⭐️ @endif<a href="{{ $fight->asideBoxer->path() }}">{{ $fight->asideBoxer->full_name }}</a> vs <a href="{{ $fight->bsideBoxer->path() }}">{{ $fight->bsideBoxer->full_name }}</a></p>
						<p>Average Viewers: {{ number_format($fight->views->average) }}</p>
						<p>Description: {{ $fight->description }}</p>
					</div>
				@endforeach 
			</div>
		</div>
	</div>
</div>
{{-- <form action="/cards/{{ $card->id }}/upload" method="post" enctype="multipart/form-data">
	@csrf
    <div class="uk-margin">
        <span class="uk-text-middle">Upload a fight poster.</span>
        <div uk-form-custom>
            <input type="file" accept="image/*" name="image">
            <span class="uk-link">Submit</span>
        </div>
    </div>
</form> --}}

@if ($card->image_path)
	<img src="{{ asset($card->image_path) }}" alt="">
@endif
{{-- {{ $card }}

{{ $network }} --}}
@endsection