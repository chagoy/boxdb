<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];

    protected $with = ['fights', 'network'];

    public function fights()
    {
    	return $this->hasMany(Fight::class);
    }

    public function network()
    {
    	return $this->belongsTo(Network::class);
    }
}
