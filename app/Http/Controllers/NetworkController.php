<?php

namespace App\Http\Controllers;

use App\Network;
use App\Card;

use Illuminate\Http\Request;

class NetworkController extends Controller
{
	public function index()
	{
		$networks = Network::get()->sortBy('name');

		return view('networks.index', compact('networks'));
	}

    public function show(Network $network)
    {
    	$views = $network->views();

        $networknums = $network->coordinates();

        $allViews = $network->allTimeCoordinates($networknums[0]->x, $networknums[count($networknums) - 1]->x);
        
    	return view('networks.show', compact('network', 'views', 'networknums', 'allViews'));
    }
}
