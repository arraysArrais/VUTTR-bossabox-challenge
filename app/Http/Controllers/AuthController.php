<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $r){

        $credentials = $r->only(['email', 'password']);

        if(Auth::attempt($credentials)){
            $user = User::where('email', $credentials['email'])->first();

            $item = time().rand(0,9999);

            $token = $user->createToken($item)->plainTextToken;

            return response()->json([
                'access-token'=> $token
            ], 200);
            
        }
        else{
            return response()->json([
                'error'=> 'Incorrect username or password'
            ], 403);
        }
    }

    public function logout(Request $r){
        
        $user = $r->user();
        $user->tokens()->delete();

        return response()->json([
            'success'=> 'access-token for user '.$user->name.' revoked'
        ], 200);
    }
}
