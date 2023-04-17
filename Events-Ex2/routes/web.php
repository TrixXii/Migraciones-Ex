<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function(){
    return view('auth/login');
});

Route::get('/' , [EventController::class, 'index'])->name('events');
Route::get('/events/create' , [EventController::class, 'create'])->name('create');
Route::post('/events', [EventController::class, 'store'])->name('store');
Route::get('/events/{id}', [EventController::class, 'show'])->name('show');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('destroy');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
