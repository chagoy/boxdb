<?php

namespace App;

use App\Boxer;
use App\Card;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
	protected $guarded = [];

    protected $with = ['asideBoxer', 'bsideBoxer', 'views'];

    protected $appends = ['date'];

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

    public function both()
    {
        return collect($this->asideBoxer(), $this->bsideBoxer());
    }

    public function views()
    {
        return $this->hasOne(View::class);
    }

    public function getNetworkAttribute()
    {
        $card = Card::where('id', $this->card_id)->with('network')->first();
        return $card->network;
        // return Network::where('id', $card->network->id)->first();
    }

    public function getDateAttribute()
    {
        $card = Card::where('id', $this->card_id)->first();
        
        return $card->format_date;
    }
}
