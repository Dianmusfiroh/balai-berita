<?php

use App\Http\Controllers\BalaiController;
use App\Http\Controllers\DataPetugasController;
use App\Http\Controllers\PeraturanController;
use App\Models\Peraturan;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('profilBalai', BalaiController::class);
    Route::resource('dataPetugas', DataPetugasController::class);
    Route::resource('peraturan', PeraturanController::class);
});