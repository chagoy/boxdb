<?php

namespace App;

use App\Boxer;
use App\Card;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
	protected $guarded = [];

    protected $with = ['aside', 'bside', 'views'];

    public function card()
    {
    	return $this->belongsTo(Card::class);
    }

    public function aside()
    {
    	return $this->hasOne(Boxer::class, 'id', 'aside');
    }

    public function bside()
    {
    	return $this->hasOne(Boxer::class, 'id', 'bside');
    }

    public function views()
    {
        return $this->hasOne(View::class);
    }
}
