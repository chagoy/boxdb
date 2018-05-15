<form method="POST" action="/cards/store" class="uk-grid-medium" uk-grid>
	@csrf
	<div class="uk-width-1-2@s">
		<label for="">A Side Fighter</label>
		<select name="aside" class="uk-select {{ $errors->has('aside') ? ' uk-form-danger' : '' }}" id="aside">
			@foreach ($boxers as $boxer)
				<option value="{{ $boxer->id }}">{{ $boxer->full_name }}</option>
			@endforeach
		</select>
		<p class="uk-text-meta uk-text-danger">{{ $errors->first('aside') }}</p>
	</div>
	<div class="uk-width-1-2@s">
		<label for="">B Side Fighter</label>
		<select name="bside" class="uk-select {{ $errors->has('aside') ? ' uk-form-danger' : '' }}" id="bside">
			@foreach ($boxers as $boxer)
				<option value="{{ $boxer->id }}">{{ $boxer->full_name }}</option>
			@endforeach
		</select>
		<p class="uk-text-meta uk-text-danger">{{ $errors->first('bside') }}</p>
	</div>
	<div class="uk-width-1-4@s">
		<label for="network" class="uk-form-label">Network</label>
		<select name="network" id="network" class="uk-select {{ $errors->has('network') ? ' uk-form-danger' : '' }}">
				<option value="">--Network</option>
			@foreach ($networks as $network)
				<option value="{{ $network->id }}">{{ $network->name }}</option>
			@endforeach
		</select>
		<p class="uk-text-meta uk-text-danger">{{ $errors->first('network') }}</p>
	</div>
	<div class="uk-width-1-4@s">
		<label for="viewers" class="uk-form-label">Viewers</label>
		<input type="integer" class="uk-input {{ $errors->has('viewers') ? ' uk-form-danger' : '' }}" name="viewers" placeholder="Only for main event fight. 500000..." value="{{ old('viewers') }}">
		<p class="uk-text-meta uk-text-danger">{{ $errors->first('viewers') }}</p>
	</div>
	<div class="uk-width-1-4@s">
		<label for="venue" class="uk-form-label">Venue</label>
		<input type="text" class="uk-input {{ $errors->has('venue') ? ' uk-form-danger' : '' }}" name="venue" placeholder="Barclays Center..." value="{{ old('venue') }}">
		<p class="uk-text-meta uk-text-danger">{{ $errors->first('venue') }}</p>
	</div>
	<div class="uk-width-1-4@s">
		<label for="date" class="uk-form-label">Date</label>
		<input type="text" class="uk-input {{ $errors->has('date') ? ' uk-form-danger' : '' }}" name="date" placeholder="MM:dd:YYYY" value="{{ old('date') }}">
		<p class="uk-text-meta uk-text-danger">{{ $errors->first('date') }}</p>
	</div>
	<div class="uk-width-1-3@s">
		<label for="main_event" class="uk-form-label">Main Event?</label>
		<input type="checkbox" class="uk-checkbox" value="true">
		<p class="uk-text-meta uk-text-danger">{{ $errors->first('main_event') }}</p>
	</div>
	<div class="uk-width-1-3@s">
		<label for="ppv" class="uk-form-label">Pay Per View?</label>
		<input type="checkbox" class="uk-checkbox" value="true">
		<p class="uk-text-meta uk-text-danger">{{ $errors->first('ppv') }}</p>
	</div>
	<div class="uk-width-1-3@s">
		<button type="submit" class="uk-button uk-button-secondary">Submit</button>
	</div>
</form>