<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/Clientes',[ClienteController::class,'index']);
Route::get('/Clientes/{id}',[ClienteController::class,'show']);
Route::post('/Clientes',[ClienteController::class,'store']);
Route::put('/Clientes/{id}',[ClienteController::class,'update']);
Route::delete('/Clientes/{id}',[ClienteController::class,'destroy']);