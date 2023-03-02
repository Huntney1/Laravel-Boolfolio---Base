<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('admin/projects/create', 'Admin\ProjectController@create')->name('admin.projects.create');


//! QUESTA ROTTA è STATA MODIFICATA PERCHE' ABBIAMO UN CONTROLLER CHE CI RESTITUISCE LA VIEW
/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

//? non la utiliziamo perche eseste una versione migliorata
/* Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashcboard'); */

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class);


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
