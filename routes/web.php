<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
}); 
//Listing Routes
Route::get('/listings', [ListingController::class, 'index']);
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/listings/store', [ListingController::class, 'store']);
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit']);
Route::put('/listing/{listing}', [ListingController::class, 'update']);
Route::delete('/listing/{listing}', [ListingController::class, 'destroy']);
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//User Routes   
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::get('/user/{user}/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


//Single Routes
Route::get('/listing/{listing}', [ListingController::class, 'show']);

