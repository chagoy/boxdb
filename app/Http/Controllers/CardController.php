<?php

namespace App\Http\Controllers;

use App\Card;
use App\Fight;
use App\View;
use App\Boxer;
use App\Network;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function create()
    {
        $boxers = Boxer::get();
        $networks = Network::get();
        return view('cards.create', compact('boxers', 'networks'));
    }

    public function store(Request $request)
    {
    	$card = Card::create([
    		'ppv' => $request->ppv == 'true' ? true : false,
    		'network_id' => $request->network,
    		'venue' => $request->venue
    	]);

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
        $cards = Card::get();
        
        return view('cards.index', compact('cards'));
    }
}
