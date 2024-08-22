<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventModelController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
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
Route::get('/participants', [IndexController::class, 'participant']);
Route::get('/about', [IndexController::class, 'about']);
// Route::get('/login', [IndexController::class, 'login']);

Route::controller(EventModelController::class)
    ->prefix('event')
    ->name('event.')
    ->group(function () {
        Route::get('about/{event}', 'about')->name('about');
        Route::get('participant/{event}', 'participant')->name('participant');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/event-booking', [BookingController::class, 'event_booking'])->name('event-booking');
    Route::get('/my-booking', [BookingController::class, 'my_booking'])->name('my-booking');
    Route::get('/individual-booking', [BookingController::class, 'individual_booking'])->name('individual-booking');
    Route::get('/group-booking', [BookingController::class, 'group_booking'])->name('group-booking');
    Route::get('/exhibition-booking', [BookingController::class, 'exhibition_booking'])->name('exhibition-booking');
    Route::get('/event-material', [BookingController::class, 'event_material'])->name('event-material');
    Route::get('/question-and-answer', [BookingController::class, 'question_and_answer'])->name('question-and-answer');
});
require __DIR__ . '/auth.php';
