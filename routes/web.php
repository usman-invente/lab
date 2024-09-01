<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
Route::post('/user/{id}/soft-delete', [UserController::class, 'softDelete'])->name('user.softDelete');

Route::get('/users', [UserController::class, 'showUserList'])->name('user.list');

Route::post('/registering', [UserController::class, 'register'])->name('registering');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');

Route::post('/logingIn', [UserController::class, 'logingIn'])->name('logingIn');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

// Show registration form
Route::get('/', [UserController::class, 'showRegistrationForm'])->name('register.form');


Route::get('/dashboardU', [UserController::class, 'showUserDashboard'])->name('dashboard.user');
Route::get('/dashboard', [UserController::class, 'showAdminDashboard'])->name('dashboard.admin');



