<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ContentController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'index']);
  });
Route::post('/',[WorkController::class, 'create']);
Route::post('/store', [WorkController::class,'store']);
Route::post('/register', [RegisterUserController::class, 'create']);

Route::post('/store',[RegisterUserController::class,'store']);

Route::get('/attendance',[ContentController::class,'attendance']);
