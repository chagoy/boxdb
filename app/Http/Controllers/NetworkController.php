<?php

namespace App\Http\Controllers;

use App\Network;
use App\Card;

use Illuminate\Http\Request;

class NetworkController extends Controller
{
	public function index()
	{
		$networks = Network::get();
		
		return view('networks.index', compact('networks'));
	}

    public function show(Network $network)
    {
    	$views = \DB::table('views')
            ->leftJoin('fights', 'views.fight_id', '=', 'fights.id')
            ->leftJoin('cards', 'fights.card_id', '=', 'cards.id')
            ->where('cards.network_id', $network->id)
            ->get()
            ->pluck('average')
            ->toArray();
    	return view('networks.show', compact('network', 'views'));
    }
}
