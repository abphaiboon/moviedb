<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::name('movies.')->group(function () {
    Route::get('/', [MoviesController::class, 'Index'])->name('all');
    Route::post('/', [MoviesController::class, 'SearchMovie'])->name('search');
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/app', function () {
//     return Inertia::render('App');
// })->middleware(['auth', 'verified'])->name('app');


require __DIR__ . '/auth.php';
