<?php

namespace App\Http\Controllers;

use App\Boxer;
use App\Network;

use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function show(Boxer $aside, Boxer $bside, Request $request)
    {
        
    	$asideAllFights = $aside->arrayOfFights();
    	$asideData = $aside->views();
    	$asidenums = $aside->coordinates();

        $asideDates = $asideData->pluck('date');
        $asideBar = $asideData->pluck('average');
    	$bsideAllFights = $bside->arrayOfFights();
    	$bsideData = $bside->views();
    	$bsidenums = $bside->coordinates();
        $data = $asideData->merge($bsideData);
        
        $dates = $data->sortBy('date')->pluck('date');

    	return view('compare.boxers', compact('aside', 'asideAllFights', 'asideData', 'asidenums', 'bside', 'bsideAllFights', 'bsideData', 'bsidenums', 'dates', 'asideBar', 'asideDates'));
    }

    public function network(Network $anetwork, Network $bnetwork, Request $request)
    {
        $aViews = $anetwork->views();
        $aNums = $anetwork->coordinates();
        $allViews = $anetwork->allTimeCoordinates($aNums[0]->x, $aNums[count($aNums) - 1]->x);

        $bViews = $bnetwork->views();
        $bNums = $bnetwork->coordinates();
        $allViews = $bnetwork->allTimeCoordinates($aNums[0]->x, $aNums[count($aNums) - 1]->x);

        $aDates = $aViews->views;
        $bDates = $bViews->views;
        $data = $aDates->merge($bDates);

        $dates = $data->sortBy('date')->pluck('date');
        
        return view('compare.networks', compact('aNums', 'bNums', 'dates', 'anetwork', 'bnetwork'));
    }
}
