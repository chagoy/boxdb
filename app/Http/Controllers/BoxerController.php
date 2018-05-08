<?php

namespace App\Http\Controllers;

use App\Boxer;
use App\Weight;

use Illuminate\Http\Request;

class BoxerController extends Controller
{
    public function index()
    {
        $featured = Boxer::get()->shuffle()->take(3);
        $boxers = Boxer::get()->groupBy('weight_id');

        return view('boxers.index', compact('featured', 'boxers'));
    }

    public function show(Boxer $boxer)
    {
        return view('boxers.show', compact('boxer'));
    }

    public function create() 
    {
        $weights = Weight::get();

        return view('boxers.create', compact('weights'));
    }

    public function store(Request $request)
    {
    	$boxer = Boxer::create([
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
            'slug' => strtolower($request->first_name . $request->last_name),
            'weight_id' => $request->division,
            'distinction' => $request->distinction,
    		'wins' => $request->wins,
    		'losses' => $request->losses,
    		'draws' => $request->draws,
    		'knockouts' => $request->knockouts
    	]);
        
    	return back()->with('status', 'Success, boxer added');
    }
}
