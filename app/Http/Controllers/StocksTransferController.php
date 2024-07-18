<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StocksTransfer;
use App\Http\Resources\StocksTransferResource;

class StocksTransferController extends Controller
{
    public function getStocksTransfer($id) {
        $stocksTransfer = new StocksTransferResource(StocksTransfer::find($id));
        return response()->json($stocksTransfer, 200, [], JSON_PRETTY_PRINT);
    }

    public function getStocksTransfers() {
        $stocksTransfers = StocksTransferResource::collection(StocksTransfer::all());
        return response()->json($stocksTransfers, 200, [], JSON_PRETTY_PRINT);
    }

    function setStocksTransfer(Request $request) {
        $fields = $request->validate([
            "reference_number" => "required",
            "transfer_from" => "required",
            "transfer_to" => "required",
            "requested_by" => "required",
            "date_requested" => "required|date",
            "date_needed" => "required|date",
            "number_of_items" => "required",
            "quantity_unit" => "required|string",
            "description" => "required|string",
            "unit_price" => "required|string",
            "amount" => "required|string",
            "user_id" => "required|exists:users,id",
        ]);

        $stocksTransfer = StocksTransfer::create([
            "reference_number" => $fields["reference_number"],
            "transfer_from" => $fields["transfer_from"],
            "transfer_to" => $fields["transfer_to"],
            "requested_by" => $fields["requested_by"],
            "date_requested" => $fields["date_requested"],
            "date_needed" => $fields["date_needed"],
            "number_of_items" => $fields["number_of_items"],
            "quantity_unit" => $fields["quantity_unit"],
            "description" => $fields["description"],
            "unit_price" => $fields["unit_price"],
            "amount" => $fields["amount"],
            "user_id" => $fields["user_id"],
        ]);
        return response()->json([
            "message" => "Stocks transfer has been added",
            "stocks_transfer" => $stocksTransfer
        ], 201, [], JSON_PRETTY_PRINT);
    }
}
