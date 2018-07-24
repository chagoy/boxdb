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

    public function arrayOfFights()
    {
        $fights = $this->allFights();
        $newFights = $fights[0]->merge($fights[1]);
        return $newFights->sortByDesc('date');
    }

    public function views()
    {
        return \DB::table('views')
            ->leftJoin('fights', 'views.fight_id', '=', 'fights.id')
            ->leftJoin('cards', 'fights.card_id', '=', 'cards.id')
            ->where('fights.aside', $this->id)
            ->orWhere('fights.bside', $this->id)
            ->get()
            ->sortBy('date');
    }

    public function coordinates()
    {
        $data = $this->views();

        $average = $data->pluck('average')->toArray();
        $dates = $data->pluck('date')->toArray();
        $boxernums = array();

        for ($i = 0; $i < count($average); $i++) {
            $object = new \stdClass;
            $object->x = $dates[$i];
            $object->y = $average[$i];
            array_push($boxernums, $object);
        };
        return $boxernums;
    }

    public function allTimeViews($first, $last)
    {
        return \DB::table('views')
            ->leftJoin('fights', 'views.fight_id', '=', 'fights.id')
            ->leftJoin('cards', 'fights.card_id', '=', 'cards.id')
            ->whereBetween('date', [$first, $last])
            ->get()
            ->sortBy('date');
    }

    public function allTimeCoordinates($first, $last)
    {
        $data = $this->allTimeViews($first, $last);

        $average = $data->pluck('average')->toArray();
        $dates = $data->pluck('date')->toArray();
        
        $alltime = array();

        for ($i = 0; $i < count($average); $i++) {
            $object = new \stdClass;
            $object->x = $dates[$i];
            $object->y = $average[$i];
            array_push($alltime, $object);
        };
        $data = new \stdClass;
        $data->totalAverage = $average;
        $data->totalDates = $dates;
        $data->coordinates = $alltime;
        
        return $data;
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
