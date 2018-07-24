<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Boxer;

use App\Card;

class UploadController extends Controller
{
    public function store(Boxer $boxer, Request $request)
	{
		request()->validate([
			'image' => ['required', 'image']
		]);

		$boxer->update([
			'image_path' => request()->file('image')->store('images', 'public')
		]);
		return back();
		// return response([], 204);
	}

	public function cardStore(Card $card, Request $request)
	{
		request()->validate([
			'image' => ['required', 'image']
		]);

		$card->update([
			'image_path' => request()->file('image')->store('images', 'public')
		]);
		return back();
	}
}
