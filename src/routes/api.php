<?php

use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('Explorer', [ExplorerController::class, 'store']);
Route::get('Explorer/{id}', [ExplorerController::class, 'show']);
Route::put('Explorer/{id}', [ExplorerController::class, 'update']);
Route::post('Explorer/Item', [ItemController::class, 'store']);
Route::post('Explorer/ExchangeItems', [ItemController::class, 'exchangeItems']);
