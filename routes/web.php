<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\RegisterController;



Route::get('/', function () {
    return view('welcome');
});
// ĐĂNG KÝ
Route::get('/register', function () {
    return view('register');
})->name('register');

//ĐĂNG NHẬP 
Route::get('/login', function () {
    return view('login');
})->name('login');

// HOME
Route::get('/home', [HomeController::class, 'index'])->name('home');

// DASHBOARD
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// LIST FILM
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
Route::get('/admin/add', function () {
    return view('admin.addUser');
})->name('admin.add');

// BOOKING
Route::get('/booking', function () {
    return view('booking');
});

// PROFILE
Route::get('/profile', function () {
    return view('profile');
});

// THÔNG TIN PHIM
Route::get('/detail', function () {
    return view('detail');
});

//LẤY CHI NHÁNH
Route::get('/cinema/{id}/branch', action: [CinemaController::class, 'getBranches'])->name('cinema.branch');

//LẤY GIỜ CHIẾU
Route::get('/branch/{branch_id}/schedule', action: [BranchController::class, 'getSchedules'])->name('branch.schedule');


