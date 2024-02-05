<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact"
    ]);
});

Route::get('/koleksi', function () {
    return view('koleksi', [
        "title" => "Koleksi"
    ]);
})->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);



Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth', 'onlyadmin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/catagory', [AdminController::class, 'catagory']);
    Route::post('/add_catagory', [AdminController::class, 'add_catagory']);
    Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);
    Route::get('/add_book', [AdminController::class, 'add_book']);
    Route::post('/store_book', [AdminController::class, 'store_book']);
});

