<?php

namespace App;

use App\Fight;
use App\Weight;

use Illuminate\Database\Eloquent\Model;

class Boxer extends Model
{
    protected $guarded = [];

    protected $casts = ['pct' => 'integer'];

    protected $with = ['weight'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return '/boxers/' . $this->slug;
    }

    public function weight()
    {
        return $this->belongsTo(Weight::class);
    }

    public function asideFights()
    {
    	return $this->hasMany(Fight::class, 'aside', 'id');
    }

    public function bsideFights()
    {
    	return $this->hasMany(Fight::class, 'bside', 'id');
    }

    public function allFights()
    {
    	return array($this->asideFights()->get(), $this->bsideFights()->get());
    }

    public function getPctAttribute()
    {
        return round($this->wins / ($this->wins + $this-> losses + $this->draws));
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getTotalViewersAttribute()
    {
        //$m[0][0]['views']->average     
        // $fightIds = Fight::where('aside', $this->id)->orWhere('bside', $this->id)->pluck('id');

        // $viewerArray = array();
        
        // foreach ($fightIds as $id) {
        //     $views = View::where('fight_id', $id)->pluck('average');
        //     array_push($viewerArray, $views[0]);
        // }

        // $sum = array_sum($viewerArray);
        // $average = array_sum($viewerArray)/count($viewerArray);

        // return ['sum' => number_format($sum), 'avg' => number_format($average)];

        $array = $this->allFights();
        $fights = $array[0]->merge($array[1]);
        $views = array();
        foreach ($fights as $fight) {
            array_push($views, $fight->views->average);
        }
        return ['average' => number_format(array_sum($views)/count($views)), 'sum' => number_format(array_sum($views))];
    }
}
