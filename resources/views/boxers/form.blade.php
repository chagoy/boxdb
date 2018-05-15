<form action="/boxers/store" method="POST" class="uk-form-stacked">
	@csrf
	<div class="uk-margin">
		<label for="first_name" class="uk-form-label">First Name</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large {{ $errors->has('first_name') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="first_name" placeholder="Gennady..." value="{{ old('first_name') }}">
			@if ($errors->has('first_name'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('first_name') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="last_name" class="uk-form-label">Last Name</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large {{ $errors->has('last_name') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="last_name" placeholder="Clenelo..." value="{{ old('last_name') }}">
			@if ($errors->has('last_name'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('last_name') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="division" class="uk-form-label">Division</label>
		<div class="uk-form-controls">
			<select name="weight_id" id="" class="uk-select uk-form-width-large" value="{{ old('weight_id') }}">
				@foreach ($weights as $weight)
					<option value="{{ $weight->id }}">{{ $weight->division }}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="uk-margin">
		<label for="wins" class="uk-form-label">Wins</label>
		<div class="uk-form-controls">
			<input type="integer" class="uk-input uk-form-width-large {{ $errors->has('wins') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="wins" placeholder="50..." value="{{ old('wins') }}">
			@if ($errors->has('wins'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('wins') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="losses" class="uk-form-label">Losses</label>
		<div class="uk-form-controls">
			<input type="integer" class="uk-input uk-form-width-large {{ $errors->has('losses') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="losses" placeholder="1..." value="{{ old('losses') }}">
			@if ($errors->has('losses'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('losses') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="draws" class="uk-form-label">Draws</label>
		<div class="uk-form-controls">
			<input type="integer" class="uk-input uk-form-width-large {{ $errors->has('draws') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="draws" placeholder="0..." value="{{ old('draws') }}">
			@if ($errors->has('draws'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('draws') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="knockouts" class="uk-form-label">Knockouts</label>
		<div class="uk-form-controls">
			<input type="integer" class="uk-input uk-form-width-large {{ $errors->has('knockouts') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="knockouts" placeholder="49..." value="{{ old('knockouts') }}">
			@if ($errors->has('knockouts'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('knockouts') }}</p>
			@endif
		</div>
	</div>

	<div class="uk-margin">
		<label for="distinction" class="uk-form-label">Best accomplishment to date for boxer</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large {{ $errors->has('distinction') ? ' uk-form-danger' : '' }}" id="form-stacked-text" name="distinction" placeholder="5 time champion... (keep it short)" value="{{ old('distinction') }}">
			@if ($errors->has('distinction'))
				<p class="uk-text-meta uk-text-danger">{{ $errors->first('distinction') }}</p>
			@endif
		</div>
	</div>

	<button type="submit" class="uk-button uk-button-secondary">Submit</button>
</form>