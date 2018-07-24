<?php

namespace App\Http\Controllers;

use App\Card;
use App\Fight;
use App\View;
use App\Boxer;
use App\Network;
use App\Venue;

use App\Http\Requests\CardSubmission;

use App\Events\CardCreated;

use Carbon\Carbon;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function create()
    {
        $boxers = Boxer::get();
        $networks = Network::get();
        $venues = Venue::get();
        return view('cards.create', compact('boxers', 'networks', 'venues'));
    }

    public function show(Card $card)
    {
        $network = Network::where('id', $card->network_id)->first();
        
        return view('cards.show', compact('card', 'network'));
    }

    public function store(CardSubmission $request)
    {
    	$card = Card::create([
    		'ppv' => $request->ppv == 'true' ? true : false,
            'date' => Carbon::parse($request->date),
    		'network_id' => $request->network,
    		'venue_id' => $request->venue,
    	]);

        if ($card) {
            event(new CardCreated($card));
        };

    	$fight = Fight::create([
    		'aside' => $request->aside,
    		'bside' => $request->bside,
    		'card_id' => $card->id,
    		'main_event' => $request->main_event == 'true' ? true : false
    	]);

    	View::create([
    		'fight_id' => $fight->id,
    		'average' => $request->viewers,
    		'peak' => $request->peak
    	]);

    	return back();
    }

    public function index()
    {
        $cards = Card::with('network')->get();
        
        return view('cards.index', compact('cards'));
    }
}
