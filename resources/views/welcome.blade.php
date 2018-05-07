@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="uk-tile uk-tile-primary">
            <p class="uk-text-center">boxdb. god damn pal.</p>
        </div>
        <div class="uk-tile uk-tile-secondary">
            <p>viewers matter.</p>
        </div>
    </div>

    {{-- <h3>create a boxer</h3>
    <form method="POST" action="/boxer/create">
        @csrf
        <input type="text" name="first_name" placeholder="first name">
        <input type="text" name="last_name" placeholder="last name">
        <input type="integer" name="wins" placeholder="wins">
        <input type="integer" name="losses" placeholder="losses">
        <input type="integer" name="draws" placeholder="draws">
        <input type="integer" name="knockouts" placeholder="knockouts">
        <button type="submit">Submit</button>
    </form>

    <form method="POST" action="/card/create">
        @csrf
        <label for="aside">A-Side</label>
        <select name="aside" id="aside">
            @foreach ($boxers as $boxer)
                <option value="{{ $boxer->id }}">{{ $boxer->first_name }} {{ $boxer->last_name }}</option>
            @endforeach
        </select>
        <label for="bside">B-Side</label>
            <select name="bside" id="bside">
                @foreach ($boxers as $boxer)
                    <option value="{{ $boxer->id }}">{{ $boxer->first_name }} {{ $boxer->last_name }}</option>
                @endforeach
            </select>
        <label for="location">Venue</label>
        <input type="text" name="venue"> 
        <label for="peak">Peak Viewers</label>
        <input type="integer" name="peak">
        <label for="average">Average Viewers</label>
        <input type="integer" name="average">
        <label for="network">Network</label>
        <input type="text" name="network">
        <label for="main_event">Main event?</label>
        <input type="checkbox" name="main_event" value="true">
        <label for="ppv">Pay per view?</label>
        <input type="checkbox" name="ppv" value="true">

        <button type="submit">Submit</button>

    </form> --}}
@endsection