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
		$data = \DB::table('views')
            ->leftJoin('fights', 'views.fight_id', '=', 'fights.id')
            ->leftJoin('cards', 'fights.card_id', '=', 'cards.id')
            ->where('cards.network_id', $this->id)
            ->get()
            ->sortBy('date');

        $object = new \stdClass;
        $object->views = $data;
        $object->dates = $data->pluck('date')->toArray();
        $object->average = $data->pluck('average')->toArray();

        return $object;
	}

	public function coordinates()
	{
		$data = $this->views();

        $networknums = array();

        for ($i = 0; $i < count($data->dates); $i++) {
            $object = new \stdClass;
            $object->x = $data->dates[$i];
            $object->y = $data->average[$i];
            array_push($networknums, $object);
        };
        
        return $networknums;
	}

	public function allTimeViews($first, $last)
    {
        return \DB::table('views')
            ->leftJoin('fights', 'views.fight_id', '=', 'fights.id')
            ->leftJoin('cards', 'fights.card_id', '=', 'cards.id')
            ->whereBetween('date', [$first, $last])
            ->get()
            ->sortBy('date');
    }

	public function allTimeCoordinates($first, $last)
	{
		$data = $this->allTimeViews($first, $last);

		$average = $data->pluck('average')->toArray();
        $dates = $data->pluck('date')->toArray();

        $alltime = array();

        for ($i = 0; $i < count($average); $i++) {
            $object = new \stdClass;
            $object->x = $dates[$i];
            $object->y = $average[$i];
            array_push($alltime, $object);
        };
        
        $data = new \stdClass;
        $data->totalAverage = $average;
        $data->totalDates = $dates;
        $data->coordinates = $alltime;
        
        return $data;
	}
}
