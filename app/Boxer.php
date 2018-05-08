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

    protected $appends = ['full_name'];

    public function getRouteKeyName()
    {
        return 'slug';
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

    public function getFullAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getPctAttribute()
    {
        return round($this->wins / ($this->wins + $this-> losses + $this->draws));
    }
}
