<?php

use App\Http\Controllers\VotingSessionController;
use App\Events\MyEvent;
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

Route::get('/', function () {
    return view('welcome');
});
//
Route::get('/eventTest', function () {
    MyEvent::dispatch();
});

Route::prefix('/{votingSession}')->group(function() {
    Route::get('/', [VotingSessionController::class, 'show'])->name('votingSession.show');
    Route::get('/winner', [VotingSessionController::class, 'winner'])->name('votingSession.winner');
});
