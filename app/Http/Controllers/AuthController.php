<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        // ]);
       $credentials = request(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return $this->respondWithToken($token);//response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

    }
  
    

    public function logout(Request $request)
    {
        $token =$request->token;
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out'.$token],200);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

}
