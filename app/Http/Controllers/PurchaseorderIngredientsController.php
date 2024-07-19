<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseorderIngredients;
use App\Http\Resources\PurchaseorderIngredientsResource;

class PurchaseorderIngredientsController extends Controller
{
    public function getPurchaseorderIngredients() {
        $purchaseorderIngredients = PurchaseorderIngredientsResource::collection(PurchaseorderIngredients::all());
        return response()->json($purchaseorderIngredients, 200, [], JSON_PRETTY_PRINT);
    }

    public function getPurchaseorderIngredient($id) {
        $purchaseorderIngredient = new PurchaseorderIngredientsResource(PurchaseorderIngredients::find($id));
        return response()->json($purchaseorderIngredient, 200, [], JSON_PRETTY_PRINT);
    }

    function setPurchaseorderIngredient(Request $request) {
        $fields = $request->validate([
            "company_name" => "required",
            "date_requested" => "required|date",
            "date_needed" => "required|date",
            "number_of_items" => "required|string",
            "quantity_unit" => "required|string",
            "particulars" => "required|string",
            "unit_price" => "required|string",
            "amount" => "required|string",
        ]);

        $purchaseorderIngredient = PurchaseorderIngredients::create([
            "company_name" => $fields["company_name"],
            "date_requested" => $fields["date_requested"],
            "date_needed" => $fields["date_needed"],
            "number_of_items" => $fields["number_of_items"],
            "quantity_unit" => $fields["quantity_unit"],
            "particulars" => $fields["particulars"],
            "unit_price" => $fields["unit_price"],
            "amount" => $fields["amount"],
            "user_id" => auth()->user()->id
        ]);
        return response()->json([
            "message" => "Purchase Order for ingredients has been added",
            "data" => $purchaseorderIngredient
        ], 201, [], JSON_PRETTY_PRINT);
    }
}
