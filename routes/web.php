<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackupController;




// ----------------------------------------------------------------------------------------

Route::get('/', function () {
    return view('welcome');
});

// ----------------------------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->group(function () {

    // Route for Login
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/admin-user/login/', 'index')->name('login');
        Route::post('/admin-user/login-process/', 'LoginProcess')->name('admin-user.login-process');
    });

    // All route with admin middlewire
    Route::middleware('admin')->group(function () {

        // Route for admin homepage / Dashboard
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/logout', 'logout')->name('logout');
            Route::get('/profile', 'profile')->name('profile');
            Route::post('/password-update/{id}', 'updatePassword')->name('password-update');
        });

        // Route for admin crud
        Route::controller(AdminController::class)->group(function () {
            Route::get('admins/all-admins', 'index')->name('admins.all'); // show all
            Route::get('admins/create-admins', 'create')->name('admins.create-admins'); // show create admin
            Route::post('admins/insert-admins', 'store')->name('admins.insert-admins'); // create process
            Route::get('admins/preview-admins/{id}', 'show')->name('admins.show-admins'); // show admin preview
            Route::get('admins/edit-admins/{id}', 'edit')->name('admins.edit-admins'); // show edit admin
            Route::post('admins/update-admins/{id}', 'update')->name('admins.update-admins'); // update process
            Route::get('admins/delete-admins/{id}', 'destroy')->name('admins.delete-admins'); // delete process
        });

        // Route for Backup
        Route::controller(BackupController::class)->group(function () {
            Route::get('backup/create-new-backup', 'create')->name('backup.create-new-backup');
            Route::get('backup/all-backup', 'index')->name('backup.all-backup');
            Route::get('backup/delete-old-backup', 'destroy')->name('backup.delete-old-backup');
            Route::get('backup/delete-all-backup', 'delete')->name('backup.delete-all-backup');
        });

    // End
    });


// End
});




