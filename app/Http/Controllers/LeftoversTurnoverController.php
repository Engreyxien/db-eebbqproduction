<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeftoversTurnover;
use App\Http\Resources\LeftoversTurnoverResource;

class LeftoversTurnoverController extends Controller
{
    public function getLeftoversTurnover($id) {
        $leftoverTurnover = new LeftoversTurnoverResource(LeftoversTurnover::find($id));
        return response()->json($leftoverTurnover, 200, [], JSON_PRETTY_PRINT);
    }

    public function getLeftoversTurnovers() {
        $leftoversTurnovers = LeftoversTurnoverResource::collection(LeftoversTurnover::all());
        return response()->json($leftoversTurnovers, 200, [], JSON_PRETTY_PRINT);
    }

    function setLeftoversTurnover(Request $request) {
        $validatedData = $request->validate([
            "branch" => "required",
            "date" => "required|date",
            "time" => "required|time",
            "item_number" => "required|string",
            "number_of_items" => "required|string",
            "quantity" => "required|string",
            "delivered_by" => "required|string",
            "user_id" => "required|exists:users,id",
        ]);

        dd($validatedData);
    
        $leftoversTurnover = LeftoversTurnover::create($validatedData);
    
        return response()->json([
            "message" => "Leftover has been added",
            "leftovers_turnover" => new LeftoversTurnoverResource($leftoversTurnover)
        ], 201, [], JSON_PRETTY_PRINT);
    }

}