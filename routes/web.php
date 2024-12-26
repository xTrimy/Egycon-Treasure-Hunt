<?php

use App\Http\Controllers\TournamentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BelongingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\TournamentMatchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [QuestController::class, 'view'])->name('home');
