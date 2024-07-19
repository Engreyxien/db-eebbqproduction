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
        $fields = $request->validate([
            "branch" => "required",
            "date" => "required|date",
            "time" => "required|time",
            "item_number" => "required|string",
            "number_of_items" => "required|string",
            "quantity" => "required|string",
            "delivered_by" => "required|string",
            "user_id" => "required|exists:users,id",
        ]);

        $leftoversTurnover = LeftoversTurnover::create([
            "branch" => $fields["branch"],
            "date" => $fields["date"],
            "time" => $fields["time"],
            "item_number" => $fields["item_number"],
            "number_of_items" => $fields["number_of_items"],
            "quantity" => $fields["quantity"],
            "delivered_by" => $fields["delivered_by"],
            "user_id" => $fields["user_id"],
        ]);
    
        return response()->json([
            "message" => "Leftover has been added",
            "leftovers_turnover" => $leftoversTurnover
        ], 201, [], JSON_PRETTY_PRINT);
    }

}