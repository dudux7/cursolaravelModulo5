<?php

use App\Models\explorer;
use App\Http\Controllers\explorerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/explorer', [explorerController::class, 'store']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
