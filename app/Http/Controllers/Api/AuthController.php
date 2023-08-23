<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function login(Request $request)
   {
       // return 'hello';
      //  return $request->all();
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // return 'success';
            $user = User::where('email', $request->email)->first();

            $token = $user->createToken('user-token', ['getTransaction', 'createTransaction', 'editTransaction', 'deleteTransaction']);
            
            return response()->json([
                'success' => true,
                'message' => 'Successfully Logged In',
                'user' => [
                    'id' => $user->id,
                    'email' => $user->email,
                    'token' => $token->plainTextToken
                ]
              
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email and Password does not match',
            ]);
        }
    }
}
