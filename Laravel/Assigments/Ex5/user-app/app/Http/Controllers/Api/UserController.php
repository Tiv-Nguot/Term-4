<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::list();
        return response()->json(['status'=>true,'data'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::insert($request);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found']);
        }
    
        return response()->json(['status' => true, 'data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::insert($request, $id);
        if (!$user) {
            return response()->json(["status" => false, "message" => "User not found: $id"]);
        }
        return response()->json(['status' => true, 'message' => "User $id updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found']);
        }
    
        $user->delete();
    
        return response()->json(['status' => true, 'message' => 'User deleted successfully']);
    }
}
