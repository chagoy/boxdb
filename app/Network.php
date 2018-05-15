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
}
