<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function(){
    return response()->json(["Sucesso" => true ]);
});

Route::prefix('clientes')->group(function(){

Route::get('/',[ClienteController::class,'index']);
Route::get('/{id}',[ClienteController::class,'show']);
Route::post('/',[ClienteController::class,'store']);
Route::put('/{id}',[ClienteController::class,'update']);
Route::delete('{id}',[ClienteController::class,'destroy']);
});


Route::prefix('Produtos')->group(function(){

    Route::get('/',[ProdutoController::class,'index']);
    Route::get('/{id}',[ProdutoController::class,'show']);
    Route::post('/',[ProdutoController::class,'store']);
    Route::put('/{id}',[ProdutoController::class,'update']);
    Route::delete('{id}',[ProdutoController::class,'destroy']);
    });