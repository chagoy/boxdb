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
    	$data = $network->views();

        $dates = $data->pluck('date')->toArray();
        $views = $data->pluck('average')->toArray();

    	return view('networks.show', compact('network', 'views',  'dates', 'data'));
    }
}
