<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\JWTAuth as JWTAuthJWTAuth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $userinput = $request->only('email','password');
        // dd($userinput);
        $token = auth('api')->attempt($userinput);
        // $token = auth('api')->attempt($userinput);
        // dd($token);
        if (!$token) {
            return response()->json([
                'message'=>'Invalid information...'
            ],401);
        }
        return response()->json([
            'message'=>'successfully logedin.',
            'token'=>$token
        ]);
    }
}
