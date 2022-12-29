<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/auth",
     *     operationId="login",
     *     tags={"auth"},
     *     summary="get access-token",
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             example="admin@bossabox.com",
     *         ),
     *         
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             example="Boss@Box1!",
     *         ),
     *         
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Incorrect username or password", 
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error while fetching data in database"
     *     ),
     *     
     * 
     * ),
     */
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


    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     security={{"bearerAuth": {}}},
     *     operationId="logout",
     *     tags={"auth"},
     *     summary="revoke access-token",
     *     @OA\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             example="Bearer 1|xyz..."
     *         ),
     *         
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unathenticated", 
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error while fetching data in database"
     *     ),
     *     
     * 
     * ),
     */

    public function logout(Request $r){
        
        $user = $r->user();
        $user->tokens()->delete();

        return response()->json([
            'success'=> 'access-token for user '.$user->name.' revoked'
        ], 200);
    }

    public function unauthorized(){
        return response()->json([
            'error'=> 'Unathenticated..'
        ], 401);
    }
}
