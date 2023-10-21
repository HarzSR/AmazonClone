<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Route

Route::prefix('/admin')->group(function() {
    Route::match(['get','post'], 'login', [AdminController::class, 'login'])->name('Login');
    Route::group(['middleware' => ['admin']], function() {
        Route::get('dashboard', [AdminController::class, 'index'])->name('Dashboard');
        Route::match(['get','post'], 'password', [AdminController::class, 'password'])->name('Update Password');
        Route::match(['get','post'], 'account', [AdminController::class, 'account'])->name('Update Account');
        Route::post('check-current-password', [AdminController::class, 'checkCurrentPassword']);
        Route::get('delete-notes', [AdminController::class, 'deleteNotes']);
        Route::get('delete-admin-image', [AdminController::class, 'deleteAdminImage']);
        Route::get('logout', [AdminController::class, 'logout']);
    });
});
