<?php

namespace App\Http\Controllers;

use App\Boxer;
use App\Weight;
use App\Card;
use stdClass;

use App\Http\Requests\BoxerSubmission;

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
        $allFights = $boxer->arrayOfFights();

        $data = $boxer->views();

        $boxernums = $boxer->coordinates();

        $allViews = $boxer->allTimeCoordinates($boxernums[0]->x, $boxernums[count($boxernums) - 1]->x);

        return view('boxers.show', compact('boxer', 'allFights', 'data', 'boxernums', 'allViews'));
    }

    public function create() 
    {
        $weights = Weight::get();

        return view('boxers.create', compact('weights'));
    }

    public function store(BoxerSubmission $request)
    {
        $validated = $request->validated();
        
    	$boxer = Boxer::create([
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
            'slug' => strtolower($request->first_name . $request->last_name),
            'weight_id' => $request->weight_id,
            'distinction' => $request->distinction,
    		'wins' => $request->wins,
    		'losses' => $request->losses,
    		'draws' => $request->draws,
    		'knockouts' => $request->knockouts
    	]);
        
    	return back()->with('status', 'Success, boxer added');
    }
}
