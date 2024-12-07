<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;


Route::get('/', function () {
    return view('welcome');
});


// LOGIN-ADMIN
Route::get('/loginA', function () {
    return view('admin.loginA');
})->name('loginA');

// LOGIN-USER 
Route::get('/loginU', function () {
    return view(view: 'users/loginU');
})->name('loginU');

Route::post('/loginU', [AuthController::class, 'login'])->name('postLoginU');

//-----xử lý đăng ký------
Route::post('/register', [AuthController::class, 'register'])->name('register');
// route xử lý đăng xuất
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// PROFILE
Route::get('/profile', function () {
    return view('users/profile');
})->name('profile');

// HOME
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// DASHBOARD
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// LIST FILMs
Route::get('/listMovie', function () {
    return view('admin.listMovie');
})->name('admin.listMovie');

// THÊM FILM
Route::get('/addMovie', function () {
    return view('admin.addMovie');
})->name('admin.addMovie');

// SỬA FILM
Route::get('/editMovie', function () {
    return view('admin.editMovie');
})->name('admin.editMovie');

// ADMIN
Route::get('/addUser', function () {
    return view('admin.addUser');
})->name('admin.addUser');

// SỬA FILM
Route::get('/editUser', function () {
    return view('admin.editUser');
})->name('admin.editUser');

// BOOKING
Route::get('/booking', function () {
    return view('users.booking');
})->name('booking');


// LẤY RẠP CHIẾU PHIM
Route::get('/home', [CinemaController::class, 'getCinemas'])->name('home');

//LẤY CHI NHÁNH
Route::get('/cinema/{id}/branch', action: [BranchController::class, 'getBranches'])->name('cinema.branch');

//LẤY GIỜ CHIẾU
Route::get('/branch/{id}/schedules', action: [ScheduleController::class, 'getSchedules'])->name('branch.schedule');

// THÔNG TIN PHIM
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('users.detail');

// Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');



