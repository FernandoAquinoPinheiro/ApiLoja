<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;







Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/',function(){return response()->json(['Sucesso'=>true]);});

Route::get('/clientes',[ClienteController::class,'index']);
Route::get('/clientes/{id}',[ClienteController::class,'show']);
Route::post('/clientes',[ClienteController::class,'store']);
Route::put('/clientes/{id}',[ClienteController::class,'update']);
Route::delete('clientes/{id}',[ClienteController::class,'destroy']);




    Route::get('/produtos',[ProdutoController::class,'index']);
    Route::get('/produtos/{id}',[ProdutoController::class,'show']);
    Route::post('/produtos',[ProdutoController::class,'store']);
    Route::put('/produtos/{id}',[ProdutoController::class,'update']);
    Route::delete('produtos/{id}',[ProdutoController::class,'destroy']);
    