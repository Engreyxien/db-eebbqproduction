<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StocksIngredients;
use App\Http\Resources\StocksIngredientsResource;

class StocksIngredientsController extends Controller
{
    public function getStocksIngredients() {
        $stocksIngredients = StocksIngredientsResource::collection(StocksIngredients::all());
        return response()->json($stocksIngredients, 200, [], JSON_PRETTY_PRINT);
    }

    public function getStocksIngredient($id) {
        $stocksIngredient = new StocksIngredientsResource(StocksIngredients::find($id));
        return response()->json($stocksIngredient, 200, [], JSON_PRETTY_PRINT);
    }

    function setStocksIngredient(Request $request) {
        $fields = $request->validate([
            'ingredients_name' => 'required',
            'beginning_stocks' => 'required|string',
            'dispatch_AM' => 'required|string',
            'dispatch_PM' => 'required|string',
            'ending_stocks' => 'required|string',
        ]);

        $stocksIngredient = StocksIngredients::create([
            'ingredients_name' => $fields['ingredients_name'],
            'beginning_stocks' => $fields['beginning_stocks'],
            'dispatch_AM' => $fields['dispatch_AM'],
            'dispatch_PM' => $fields['dispatch_PM'],
            'ending_stocks' => $fields['ending_stocks'],
            "user_id" => auth()->user()->id
        ]);

        return response()->json([
            'message' => 'Stocks Ingredient Created',
            'data' => $stocksIngredient
        ], 201);
    }

}
