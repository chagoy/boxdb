<form action="/venues/store" method="POST" class="uk-form-stacked">
	@csrf
	<div class="uk-margin">
		<label for="venue" class="uk-form-label">Venue Name</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large {{ $errors->has('venue') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="venue" placeholder="Madison Square Garden..." value="{{ old('venue') }}">
			@if ($errors->has('venue')) 
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('venue') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="city" class="uk-form-label">City</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large {{ $errors->has('city') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="city" placeholder="Carson..." value="{{ old('city') }}">
			@if ($errors->has('city'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('city') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="state" class="uk-form-label">State</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large {{ $errors->has('state') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="state" placeholder="Florida..." value="{{ old('state') }}">
			@if ($errors->has('state'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('state') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="country" class="uk-form-label">Country</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large {{ $errors->has('country') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="country" placeholder="United Kingdom..." value="{{ old('country') }}">
			@if ($errors->has('country'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('country') }}</p>
			@endif
		</div>
	</div>
	<button type="submit" class="uk-button uk-button-secondary">Submit</button>
</form>