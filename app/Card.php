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

    public function getFormatDateAttribute()
    {
        return Carbon::parse($this->date)->toFormattedDateString();
    }
}
