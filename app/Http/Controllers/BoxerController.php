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
        $fights = $boxer->allFights();
        $newFights = $fights[0]->merge($fights[1]);
        $allFights = $newFights->sortByDesc('date');

        $data = \DB::table('views')
            ->leftJoin('fights', 'views.fight_id', '=', 'fights.id')
            ->leftJoin('cards', 'fights.card_id', '=', 'cards.id')
            ->where('fights.aside', $boxer->id)
            ->orWhere('fights.bside', $boxer->id)
            ->get()
            ->sortBy('date');

        $average = $data->pluck('average')->toArray();
        $dates = $data->pluck('date')->toArray();
        $boxernums = array();

        for ($i = 0; $i < count($average); $i++) {
            $object = new stdClass;
            $object->x = $dates[$i];
            $object->y = $average[$i];
            array_push($boxernums, $object);
        };

        
        
        $allViews = \DB::table('views')
            ->leftJoin('fights', 'views.fight_id', '=', 'fights.id')
            ->leftJoin('cards', 'fights.card_id', '=', 'cards.id')
            ->whereBetween('date', [$dates[0], $dates[count($dates) - 1]])
            ->get()
            ->sortBy('date');

        $totalAverage = $allViews->pluck('average')->toArray();
        $totalDates = $allViews->pluck('date')->toArray();
        
        $alltime = array();

        for ($i = 0; $i < count($totalAverage); $i++) {
            $object = new stdClass;
            $object->x = $totalDates[$i];
            $object->y = $totalAverage[$i];
            array_push($alltime, $object);
        };
        
        return view('boxers.show', compact('boxer', 'allFights', 'average', 'dates', 'totalAverage', 'totalDates', 'alltime', 'boxernums'));
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
