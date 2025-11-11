<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

// Create payment
Route::post('/payment/create', [PaymentController::class, 'create']);

// Webhook callback dari Xendit
Route::post('/payment/callback', [PaymentController::class, 'callback']);

// Cek status dari database (cepat, tidak hit Xendit)
Route::get('/payment/check/{external_id}', [PaymentController::class, 'checkStatus']);

// Sync status dari Xendit (force update, hit Xendit API)
Route::get('/payment/sync/{external_id}', [PaymentController::class, 'syncStatus']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
