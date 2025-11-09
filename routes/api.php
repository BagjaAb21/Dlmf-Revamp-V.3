<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

// API routes
Route::post('/payment/create', [PaymentController::class, 'create']);
Route::post('/payment/callback', [PaymentController::class, 'callback']);

// checking status by external_id
Route::get('/payment/check/{external_id}', [PaymentController::class, 'checkStatus']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
