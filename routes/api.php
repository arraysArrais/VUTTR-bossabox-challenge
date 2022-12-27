<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/tools', [MainController::class, 'getTools']);

//criado um middleware para forçar o uso de headers especificos nesta rota
Route::post('/tools', [MainController::class, 'createTool'])->middleware('headerEnforcer'); 
Route::patch('/tools/{id}', [MainController::class, 'updateTool']);
Route::delete('/tools/{id}', [MainController::class, 'deleteTool']);
