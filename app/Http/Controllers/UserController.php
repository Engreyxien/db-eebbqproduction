<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function getUser($id) {
        $user = new UserResource(User::find($id));
        return response()->json($user, 200, [], JSON_PRETTY_PRINT);
    }
    public function getUsers() {
        $users = UserResource::collection(User::all());
        return response()->json($users, 200, [], JSON_PRETTY_PRINT);
    }
    public function updateProfile(Request $request) {
        $user = User::find(auth( )->user()->id);

        if (!$user) {
            return response()->json([
                "message" => "User not found"
            ], 404, [], JSON_PRETTY_PRINT);
        }
        $fields = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "contact_number" => "required",
            "email_address" => "required",
        ]);

        $user->first_name = $fields["first_name"];
        $user->last_name = $fields["last_name"];
        $user->contact_number = $fields["contact_number"];
        $user->email_address = $fields["email_address"];
        $user->save();
        return response()->json([
            "message" => "Profile has been updated",
        ], 200, [], JSON_PRETTY_PRINT);
    }
    public function updateUser (Request $request, $id) {
        $user = User::find($id);
}

    public function updatePassword(Request $request) {
        $user = User::find(auth( )->user()->id);
        if (!$user) {
            return response()->json([
                "message" => "User not found"
            ], 404, [], JSON_PRETTY_PRINT);
        }

        $fields = $request->validate([
            "password" => "required|confirmed",
        ]);
        $user->password = Hash::make($fields["password"]);
        $user->save();
        return response()->json([
            "message" => "Password has been updated",
        ], 200, [], JSON_PRETTY_PRINT);
    }
}

