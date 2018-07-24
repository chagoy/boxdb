<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
	protected $guarded = [];

	protected $with = ['cards'];
	
	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function path()
	{
		return "/venues/{$this->slug}";
	}

    public function cards()
    {
    	return $this->hasMany(Card::class);
    }

    public function getLocationAttribute()
    {
    	return "$this->city, $this->state, $this->country";
    }
}
