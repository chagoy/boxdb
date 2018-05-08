<?php

namespace App;

use App\Boxer;
use App\Card;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
	protected $guarded = [];

    protected $with = ['asideBoxer', 'bsideBoxer', 'views'];

    // protected $appends = ['aside', 'bside'];

    public function card()
    {
    	return $this->belongsTo(Card::class);
    }

    public function asideBoxer()
    {
    	return $this->hasOne(Boxer::class, 'id', 'aside');
    }

    public function bsideBoxer()
    {
    	return $this->hasOne(Boxer::class, 'id', 'bside');
    }

    public function views()
    {
        return $this->hasOne(View::class);
    }
}
