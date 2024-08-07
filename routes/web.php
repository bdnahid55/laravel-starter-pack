<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// ----------------------------------------------------------------------------------------

// Route for Login
Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/admin-user/login', 'index')->name('admin.login');
});

// ----------------------------------------------------------------------------------------







