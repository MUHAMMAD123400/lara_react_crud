<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index($id = null)
    {
        if (isset($id)) {
            $data = User::where('id' , $id)->first();
        } else {
            $data = User::latest()->get();
        }

        return response()->json([
            'message' => 'data get successfully!',
            'data' => $data,
        ]);
    }

    public function addUpdate(Request $request, User $user)
    {
        $user->name = isset($request->name) ? $request->name : $user->name;
        $user->email = isset($request->email) ? $request->email : $user->email;
        $user->mobile = isset($request->mobile) ? $request->mobile : $user->mobile;
        $user->save();

        return response()->json([
            'message' => 'data get successfully!',
            'data' => $user,
        ]);
    }

    public function delete(User $user){
        $user->delete();
        return response()->json([
            'message' => 'data delete successfully!',
        ]);
    }
}
