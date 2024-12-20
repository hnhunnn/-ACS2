<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginAdminController;





Route::get('/', function () {
    return view('welcome');
});


// LOGIN-ADMIN
Route::get('/loginA', function () {
    return view('admin.loginA');
})->name('loginA');
// LOGIN-LOGOUT (ADMIN)
Route::get('/login', [AuthController::class, 'showLoginForm2'])->name('login');
Route::post('/loginA', [AuthController::class, 'loginAdmin'])->name('loginA');
Route::post('/logoutA', [AuthController::class, 'logoutAdmin'])->name('logoutA');

// XỬ LÝ QUÊN MẬT KHẨU ADMIN
Route::get('/forgot', function () {
    return view('pass.forgotPass');
})->name('forgot');

Route::post('/forgot', [PasswordResetController::class, 'sendResetLink'])->name('forgot');

Route::get('reset/{token}', function ($token) {
    return view('pass.resetPass', ['token' => $token]);
})->name('password.reset');

Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('resetPass');


// LOGIN-USER 
Route::get('/loginU', function () {
    return view(view: 'users/loginU');
})->name('loginU');
// LOGIN-LOGOUT-REGISTER (USER)
Route::post('/loginU', [AuthController::class, 'login'])->name('postLoginU');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// HIỂN THỊ VÀ LƯU THÔNG TIN (PROFILE)
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

// CẬP NHẬT THÔNG TIN NGƯỜI DÙNG
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');

// LẤY RẠP CHIẾU PHIM
Route::get('/home', [CinemaController::class, 'getCinemas'])->name('home');

//LẤY CHI NHÁNH
Route::get('/cinema/{id}/branch', action: [BranchController::class, 'getBranches'])->name('cinema.branch');

//LẤY GIỜ CHIẾU
Route::get('/branch/{id}/schedules', action: [ScheduleController::class, 'getSchedules'])->name('branch.schedule');

// THÔNG TIN PHIM
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('users.detail');

// DASHBOARD
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');


// LIST NGƯỜI DÙNG(DASHBOARD) 
Route::get('/dashboard', [AdminController::class, 'manageUsers'])->name('admin.dashboard');
// SỬA NGƯỜI DÙNG(ADMIN)
Route::get('/admin/edit-user/{id}', [AdminController::class, 'edit'])->name('admin.editUser');
Route::put('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');

// THÊM NGƯỜI DÙNG
Route::get('/admin/add-user', [AdminController::class, 'create'])->name('admin.addUser');
Route::post('/admin/add-user', [AdminController::class, 'store'])->name('admin.storeUser');
// XÓA NGƯỜI DÙNG
Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('admin.deleteUser');
// TÌM NGƯỜI DÙNG
Route::get('/admin/users', [AdminController::class, 'index2'])->name('admin.users');

// LIST FILMS
Route::get('/listMovie', [AdminController::class, 'index'])->name('admin.listMovie');
// SỬA FILM
Route::get('/admin/movie/edit/{id}', [AdminController::class, 'editM'])->name('admin.editMovie');
Route::post('/admin/movies/update', [AdminController::class, 'updateM'])->name('admin.updateMovie');
// XÓA PHIM
Route::get('/admin/movie/delete/{id}', [AdminController::class, 'deleteM'])->name('admin.deleteMovie');
// THÊM FILM
Route::post('/movies/store', [AdminController::class, 'storeM'])->name('admin.storeMovie');
Route::get('/addMovie', function () {
    return view('admin.addMovie');
})->name('admin.addMovie');
// TÌM KIẾM FILM
Route::get('/admin/movies', [AdminController::class, 'listMovies'])->name('admin.listMovies');
// ADMIN
Route::get('/addUser', function () {
    return view('admin.addUser');
})->name('admin.addUser');

// BOOKING
Route::get('/booking', function () {
    return view('users.booking');
})->name('booking');

// ĐẶT VÉ BOOKING
Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking');

Route::post('/booking/{id}/process', [BookingController::class, 'processBooking'])->name('booking.process');
