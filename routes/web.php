<?php

use App\Http\Controllers\EventModelController;
use App\Http\Controllers\IndexController;
use App\Models\EventModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::controller(EventModelController::class)
    ->prefix('event')
    ->name('event.')
    ->group(function () {
        Route::get('about/{event}', 'about')->name('about');
        Route::get('participant/{event}', 'participant')->name('participant');
    });
