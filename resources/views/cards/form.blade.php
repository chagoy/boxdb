<form method="POST" action="/cards/store" class="uk-grid-medium" uk-grid>
	@csrf
	<div class="uk-width-1-2@s">
		<label for="">A Side Fighter</label>
		<select name="aside" class="uk-select" id="aside">
			@foreach ($boxers as $boxer)
				<option value="{{ $boxer->id }}">{{ $boxer->full_name }}</option>
			@endforeach
		</select>
	</div>
	<div class="uk-width-1-2@s">
		<label for="">B Side Fighter</label>
		<select name="bside" class="uk-select" id="bside">
			@foreach ($boxers as $boxer)
				<option value="{{ $boxer->id }}">{{ $boxer->full_name }}</option>
			@endforeach
		</select>
	</div>
	<div class="uk-width-1-3@s">
		<label for="network" class="uk-form-label">Network</label>
		<select name="network" id="network" class="uk-select">
			@foreach ($networks as $network)
				<option value="{{ $network->id }}">{{ $network->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="uk-width-1-3@s">
		<label for="viewers" class="uk-form-label">Viewers</label>
		<input type="integer" class="uk-input" name="viewers" placeholder="Only for main event fight. 500000...">
	</div>
	<div class="uk-width-1-3@s">
		<label for="venue" class="uk-form-label">Venue</label>
		<input type="text" class="uk-input" name="venue" placeholder="Barclays Center...">
	</div>
	<div class="uk-width-1-3@s">
		<label for="main_event" class="uk-form-label">Main Event?</label>
		<input type="checkbox" class="uk-checkbox" value="true">
	</div>
	<div class="uk-width-1-3@s">
		<label for="ppv" class="uk-form-label">Pay Per View?</label>
		<input type="checkbox" class="uk-checkbox" value="true">
	</div>
	<div class="uk-width-1-3@s">
		<button type="submit" class="uk-button uk-button-secondary">Submit</button>
	</div>
</form>