<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
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
        // return User::all();
        return UserResource::collection(User::paginate());
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        // return $request->name;
        return UserResource::make(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return UserResource::make($user);
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        // return $user;

        if (isset($request->name)) {
            $user->name = $request->name;
        }

        if (isset($request->email)) {
            $user->email = $request->email; 
        }

        if (isset($request->password)) {
            $user->password = $request->password; 
        }

        $user->save();

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // return $user;
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted'
        ]);
    }
}
