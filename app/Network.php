<?php

namespace App;

use App\Card;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
	public function cards()
	{
		return $this->hasMany(Card::class);
	}
}
