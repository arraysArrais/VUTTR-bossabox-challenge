<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//protected routes
Route::middleware(['auth:api'/*'headerEnforcer', 'auth:sanctum'*/])->group(function (){
    Route::get('/tools', [MainController::class, 'getTools']);
    Route::post('/tools', [MainController::class, 'createTool']);
    Route::delete('/tools/{id}', [MainController::class, 'deleteTool']);
    Route::patch('/tools/{id}', [MainController::class, 'updateTool']);
    //sanctum route Route::post('/auth/logout', [AuthController::class, 'logout']);
});

//auth routes
//sanctum route Route::post('/auth', [AuthController::class, 'login']);
Route::post('/auth', [AuthController::class, 'login']);


Route::get('/unauthorizedResponse', [AuthController::class, 'unauthorized'])->name('login');


