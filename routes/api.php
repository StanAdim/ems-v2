<?php

use App\Http\Controllers\Api\BillingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('billing')
    ->name('billing.')
    ->controller(BillingController::class)
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::post('/update-control-number/{uuid}', 'updateControlNo')->name('update_control_number');
        Route::post('/update-payment-status/{uuid}', 'updatePaymentStatus')->name('update_payment_status');
    });
