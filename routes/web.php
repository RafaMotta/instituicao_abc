<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;

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

Route::middleware(['auth:sanctum', 'verified'])
->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
->get('/turmas', function () {
    return view('turmas');
})->name('turmas');

Route::middleware(['auth:sanctum', 'verified'])
->get('/materiais', function () {
    return view('materiais');
})->name('materiais');

Route::middleware(['auth:sanctum', 'verified'])
->get('/disciplinas', function () {
    return view('disciplinas');
})->name('disciplinas');

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
