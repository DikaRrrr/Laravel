<?php

use App\Models\Peminjaman;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Middleware\Admin;

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

Route::get('/forgot_password', [ForgotPasswordController::class, 'index'])->middleware('guest');
Route::post('/forgot_password', [ForgotPasswordController::class, 'forgot_password']);

Route::middleware('auth', 'onlyadmin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/catagory', [AdminController::class, 'catagory']);
    Route::post('/add_catagory', [AdminController::class, 'add_catagory']);
    Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);
    Route::get('/add_book', [AdminController::class, 'add_book']);
    Route::post('/store_book', [AdminController::class, 'store_book']);
    Route::get('/delete_book/{id}', [AdminController::class, 'delete_book']);
    Route::get('/update_book/{id}', [AdminController::class, 'update_book']);
    Route::post('/update_book_confirm/{id}', [AdminController::class, 'update_book_confirm']);
    Route::get('/data_peminjaman', [AdminController::class, 'data_peminjaman']);
    Route::post('/kembalikan_buku/{id}', [AdminController::class, 'kembalikan_buku']);
    Route::get('/data_users', [AdminController::class, 'data_users']);
    Route::get('/update_catagory/{id}', [AdminController::class, 'update_catagory']);
    Route::post('/update_catagory_confirm/{id}', [AdminController::class, 'update_catagory_confirm']);
    Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
    Route::get('/update_password/{id}', [AdminController::class, 'update_password']);
    Route::post('/update_password_confirm/{id}', [AdminController::class, 'update_password_confirm']);

});

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::middleware('auth', 'onlyuser')->group(function () {
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'index']);
    Route::post('/pinjam_buku/{id}', [PeminjamanController::class, 'pinjam_buku']);
    Route::get('/koleksi', [PeminjamanController::class, 'koleksi']);
    Route::post('/add_comment/{id}', [PeminjamanController::class, 'add_comment']);
    Route::post('/delete_comment/{id}', [PeminjamanController::class, 'delete_comment']);

});





