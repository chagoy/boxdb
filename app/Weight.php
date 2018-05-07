<?php

namespace App;

use App\Boxer;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    public function boxers()
    {
    	return $this->hasMany(Boxer::class);
    }
}
