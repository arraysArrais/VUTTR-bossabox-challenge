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
     *     path="/api/auth/",
     *     operationId="login",
     *     tags={"auth"},
     *     summary="get access-token",
     *     description="JWT Token. Required for all requests.",
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
     *         @OA\JsonContent(
     *         type="object",
     *          @OA\Property(property="access-token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."),
     *          @OA\Property(property="token_type", type="string", example="bearer"),
     *          @OA\Property(property="expires_in", type="int", example="3600"),
     *       ),
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
     * 
     * ),
     */
    public function login(Request $r){

        //sanctum method
        // $credentials = $r->only(['email', 'password']);

        // if(Auth::attempt($credentials)){
        //     $user = User::where('email', $credentials['email'])->first();

        //     $item = time().rand(0,9999);

        //     $token = $user->createToken($item)->plainTextToken;

        //     return response()->json([
        //         'access-token'=> $token
        //     ], 200);
            
        // }
        // else{
        //     return response()->json([
        //         'error'=> 'Incorrect username or password'
        //     ], 403);
        // }

        //jwt-auth
        $credentials = $r->only(['email', 'password']);
        $token = Auth::attempt($credentials);

        //custom expiration time (minutes)
        //$token = auth()->setTTL(2)->attempt($credentials);

        if($token){
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
            ], 200);
        }else{
            return response()->json([
                        'error'=> 'Incorrect username or password'
                    ], 401);
        }

        


    }

//sanctum method
//     public function logout(Request $r){
        
//         $user = $r->user();
//         $user->tokens()->delete();

//         return response()->json([
//             'success'=> 'access-token for user '.$user->name.' revoked'
//         ], 200);
//     }

//     public function unauthorized(){
//         return response()->json([
//             'error'=> 'Unathenticated..'
//         ], 401);
//     }
// }
}