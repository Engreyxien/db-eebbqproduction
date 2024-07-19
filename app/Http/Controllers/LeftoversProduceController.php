<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeftoversProduce;
use App\Http\Resources\LeftoversProduceResource;

class LeftoversProduceController extends Controller
{
    public function getLeftoversProduce($id) {
        $leftoversProduce = new LeftoversProduceResource(LeftoversProduce::find($id));
        return response()->json($leftoversProduce, 200, [], JSON_PRETTY_PRINT);
    }

    public function getLeftoversProduces() {
        $leftoversProduces = LeftoversProduceResource::collection(LeftoversProduce::all());
        return response()->json($leftoversProduces, 200, [], JSON_PRETTY_PRINT);
    }

    function setLeftoversProduce(Request $request) {
        $fields = $request->validate([
            "number_of_fried_chicken" => "required|string",
            "number_of_lumpia_produce" => "required|string",
            "dispatched_to" => "required",
        ]);

        $leftoversProduce = LeftoversProduce::create([
            "number_of_fried_chicken" => $fields["number_of_fried_chicken"],
            "number_of_lumpia_produce" => $fields["number_of_lumpia_produce"],
            "dispatched_to" => $fields["dispatched_to"],
            "user_id" => auth()->user()->id
        ]);
        return response()->json([
            "message" => "Leftovers produce has been added",
            "data" => $leftoversProduce
        ], 201, [], JSON_PRETTY_PRINT);
    }

}
