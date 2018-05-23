<?php

namespace App;

use App\Card;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
	protected $with = ['cards'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function cards()
	{
		return $this->hasMany(Card::class);
	}

	public function path()
	{
		return '/networks/' . $this->slug;
	}

	public function fightsOnly()
	{
		$fights = [];
		foreach ($this->cards as $card) {
			array_push($fights, $card->fights);
		}
		return $fights;
	}

	public function views()
	{
		return \DB::table('views')
            ->leftJoin('fights', 'views.fight_id', '=', 'fights.id')
            ->leftJoin('cards', 'fights.card_id', '=', 'cards.id')
            ->where('cards.network_id', $this->id)
            ->get()
            ->sortBy('date');
	}
}
