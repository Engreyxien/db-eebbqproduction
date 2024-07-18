<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseorderChicken;
use App\Http\Resources\PurchaseorderChickenResource;

class PurchaseorderChickenController extends Controller
{
    public function getPurchaseorderChickens() {
        $purchaseorderChickens = PurchaseorderChickenResource::collection(PurchaseorderChicken::all());
        return response()->json($purchaseorderChickens, 200, [], JSON_PRETTY_PRINT);
    }

    public function getPurchaseorderChicken($id) {
        $purchaseorderChicken = new PurchaseorderChickenResource(PurchaseorderChicken::find($id));
        return response()->json($purchaseorderChicken, 200, [], JSON_PRETTY_PRINT);
    }

function setPurchaseorderChicken(Request $request) {
    $fields = $request->validate([
        "company_name" => "required",
        "date_requested" => "required|date",
        "date_needed" => "required|date",
        "number_of_items" => "required|string",
        "quantity_unit" => "required|string",
        "particulars" => "required|string",
        "unit_price" => "required|string",
        "amount" => "required|string",
        "user_id" => "required|exists:users,id",
    ]);

    $purchaseorderChicken = PurchaseorderChicken::create([
        "company_name" => $fields["company_name"],
        "date_requested" => $fields["date_requested"],
        "date_needed" => $fields["date_needed"],
        "number_of_items" => $fields["number_of_items"],
        "quantity_unit" => $fields["quantity_unit"],
        "particulars" => $fields["particulars"],
        "unit_price" => $fields["unit_price"],
        "amount" => $fields["amount"],
        "user_id" => $fields["user_id"],
    ]);
    return response()->json([
        "message" => "Purchase Order for chicken has been added",
        "purchaseorder_chicken" => $purchaseorderChicken
    ], 201, [], JSON_PRETTY_PRINT);

}
}
