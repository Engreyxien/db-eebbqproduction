<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materials;
use App\Http\Resources\MaterialsResource;

class MaterialsController extends Controller
{

    public function getMaterial($id) {
        $materials = new MaterialsResource(Materials::find($id));
        return response()->json($materials, 200, [], JSON_PRETTY_PRINT);
    }

    public function getMaterials() {
        $materials = MaterialsResource::collection(Materials::all());
        return response()->json($materials, 200, [], JSON_PRETTY_PRINT);
    }

    function setMaterials(Request $request) {
        $fields = $request->validate([
            "materials_name" => "required",
            "number_of_items" => "required|string",
            "user_id" => "required|exists:users,id",
        ]);

        $materials = Materials::create([
            "materials_name" => $fields["materials_name"],
            "number_of_items" => $fields["number_of_items"],
            "user_id" => $fields["user_id"],
        ]);
        return response()->json([
            "message" => "Materials has been added",
            "materials" => $materials
        ], 201, [], JSON_PRETTY_PRINT);
    }
}
