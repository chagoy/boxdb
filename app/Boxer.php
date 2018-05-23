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

    public function getImagePathAttribute($image)
    {
        return $image ?: '/images/default.png';
    }

    public function getNumbersRecordAttribute() 
    {
        if ($this->draws) {
            return "$this->wins($this->knockouts)-$this->losses-$this->draws";
        }
        return "$this->wins($this->knockouts)-$this->losses";
    }

    public function getVerboseRecordAttribute()
    {
        if ($this->draws) {
            return "Wins: $this->wins Losses: $this->losses Draws: $this->draws Knockouts: $this->knockouts";
        }
        return "Wins: $this->wins Losses: $this->losses KOs: $this->knockouts";
    }

    public function getTotalViewersAttribute()
    {
        $array = $this->allFights();
        $fights = $array[0]->merge($array[1]);
        $views = array();
        foreach ($fights as $fight) {
            array_push($views, $fight->views->average);
        }
        return ['average' => number_format(array_sum($views)/count($views)), 'sum' => number_format(array_sum($views))];
    }

    public function getKoPctAttribute()
    {
        return $this->knockouts / $this->wins + $this->losses + $this->draws;
    }
}
