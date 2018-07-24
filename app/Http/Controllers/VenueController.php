<?php

namespace App\Http\Controllers;

use App\Venue;

use App\Http\Requests\VenueSubmission;

use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
    	$venues = Venue::get();
        
        return view('venues.index', compact('venues'));
    }

    public function show(Venue $venue)
    {
    	return view('venues.show', compact('venue'));
    }

    public function create()
    {
    	return view('venues.create');
    }

    public function store(VenueSubmission $request)
    {
    	$validated = $request->validated();

    	$venue = Venue::create([
    		'venue' => $request->venue,
    		'city' => $request->city,
    		'state' => $request->state,
    		'country' => $request->country,
    		'slug' => str_slug($request->venue)
		]);

		return back()->with('status', 'Success, new venue added');
    }
}
