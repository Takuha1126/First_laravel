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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [WorkController::class, 'index'])->name('home');
});

Route::post('/',[WorkController::class,'create']);
Route::post('/end',[WorkController::class,'store']);
Route::post('/restIn',[WorkController::class,'breakIn']);
Route::post('/restOut',[WorkController::class,'breakOut']);

Route::get('/login/{credentials}', [AuthenticatedSessionController::class,'login']);
Route::post('/login',[AuthenticatedSessionController::class,'store']);
Route::get('/logout',[AuthenticatedSessionController::class,'destroy']);
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->middleware('auth');
Route::get('/register',[RegisterUserController::class,'register']);
Route::post('/register',[RegisterUserController::class,'create']);
Route::get('/attendance',[ContentController::class,'attendance']);
Route::get('/rest_time',[ContentController::class,'create']);
Route::post('/attendance',[ContentController::class,'store']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



