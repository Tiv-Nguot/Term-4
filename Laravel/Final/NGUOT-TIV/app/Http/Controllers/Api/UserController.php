<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\UserResource;
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
        $users = UserResource::collection($users);
        return response()->json(
            [
                'success' => true,
                'users' => $users
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::store($request);
        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't create the user"
                ]
            );
        }

        return response()->json(
            [
                'success' => true,
                'message' => "created user successfully"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't update the user".$id
                ]
            );
        }
        $user->store($request,$id);
        return response()->json(
            [
                'success' => true,
                'message' => "User updated successfully"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Can't delete the user ID ".$id
                ]
            );
        }

        $user->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "deleted user successfully with ID ".$id
            ]
        );
    }
}
