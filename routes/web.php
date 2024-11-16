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
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/listMovie', function () {
    return view('admin.listMovie');
})->name('admin.listMovie');

Route::get('/addMovie', function () {
    return view('admin.addMovie');
})->name('admin.addMovie');

Route::get('/editMovie', function () {
    return view('admin.editMovie');
})->name('admin.editMovie');

Route::get('/admin/add', function () {
    return view('admin.addUser');
})->name('admin.add');

Route::get('/profile', function () {
    return view('profile');
});
// Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/detail', function () {
    return view('detail');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');


//lấy chi nhánh 
Route::get('/cinema/{id}/branch', action: [CinemaController::class, 'getBranches'])->name('cinema.branch');

//lấy giờ chiếu
Route::get('/branch/{branch_id}/schedule', action: [BranchController::class, 'getSchedules'])->name('branch.schedule');


