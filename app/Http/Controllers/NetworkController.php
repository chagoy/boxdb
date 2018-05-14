<?php

namespace App\Http\Controllers;

use App\Network;

use Illuminate\Http\Request;

class NetworkController extends Controller
{
    public function show(Network $network)
    {
    	return view('networks.show', compact('network'));
    }
}
