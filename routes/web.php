<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Route::get('/login', function() {
    if (Auth::check()) {
        return redirect('/admin');
    } else {
        return View('login');
    }
})->name('login');

Route::get('/admin/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/logout', function() {
    if (Auth::check()) {
        Auth::logout();
    }
    return redirect('/');
});

Route::post('/requests', [\App\Http\Controllers\RequestsController::class, 'addRequest']);

Route::middleware('auth')->group(function() {
    Route::get('/admin', function() {
        return View('admin');
    });

    Route::post('/camp', [\App\Http\Controllers\CampController::class, 'add']);
    Route::post('/camp/delete', [\App\Http\Controllers\CampController::class, 'delete']);
});
