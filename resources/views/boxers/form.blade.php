<form action="/boxers/store" method="POST" class="uk-form-stacked">
	@csrf
	<div class="uk-margin">
		<label for="first_name" class="uk-form-label">First Name</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large" id="form-stacked-text" name="first_name" placeholder="Gennady...">
		</div>
	</div>

	<div class="uk-margin">
		<label for="last_name" class="uk-form-label">Last Name</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large" id="form-stacked-text" name="last_name" placeholder="Clenelo...">
		</div>
	</div>

	<div class="uk-margin">
		<label for="division" class="uk-form-label">Division</label>
		<div class="uk-form-controls">
			<select name="division" id="" class="uk-select uk-form-width-large">
				@foreach ($weights as $weight)
					<option value="{{ $weight->id }}">{{ $weight->division }}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="uk-margin">
		<label for="wins" class="uk-form-label">Wins</label>
		<div class="uk-form-controls">
			<input type="integer" class="uk-input uk-form-width-large" id="form-stacked-text" name="wins" placeholder="50...">
		</div>
	</div>

	<div class="uk-margin">
		<label for="losses" class="uk-form-label">Losses</label>
		<div class="uk-form-controls">
			<input type="integer" class="uk-input uk-form-width-large" id="form-stacked-text" name="losses" placeholder="1...">
		</div>
	</div>

	<div class="uk-margin">
		<label for="draws" class="uk-form-label">Draws</label>
		<div class="uk-form-controls">
			<input type="integer" class="uk-input uk-form-width-large" id="form-stacked-text" name="draws" placeholder="0...">
		</div>
	</div>

	<div class="uk-margin">
		<label for="knockouts" class="uk-form-label">Knockouts</label>
		<div class="uk-form-controls">
			<input type="integer" class="uk-input uk-form-width-large" id="form-stacked-text" name="knockouts" placeholder="49...">
		</div>
	</div>

	<div class="uk-margin">
		<label for="distinction" class="uk-form-label">Best accomplishment to date for boxer</label>
		<div class="uk-form-controls">
			<input type="text" class="uk-input uk-form-width-large" id="form-stacked-text" name="distinction" placeholder="5 time champion... (keep it short)">
		</div>
	</div>

	<button type="submit" class="uk-button uk-button-secondary">Submit</button>
</form>