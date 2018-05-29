<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Card extends Model
{
    protected $guarded = [];

    protected $with = ['fights'];

    protected $casts = ['date' => 'date'];

    public function fights()
    {
    	return $this->hasMany(Fight::class);
    }

    public function network()
    {
    	return $this->belongsTo(Network::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function getAverageAttribute()
    {
        $views = array();
        foreach ($this->fights as $fight) {
            array_push($views, $fight->views->average);
        }

        return number_format(array_sum($views) / count($views));
    }

    public function getHeadlineAttribute()
    {
        return $this->fights[0]->headline;
    }

    public function getFormatDateAttribute()
    {
        return Carbon::parse($this->date)->toFormattedDateString();
    }
}
