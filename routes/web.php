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

Route::middleware('auth')->group(function (): void {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Route

Route::prefix('/admin')->group(function(): void {
    Route::match(['get','post'], 'login', [AdminController::class, 'login'])->name('Login');
    Route::group(['middleware' => ['admin']], function(): void {
        Route::get('dashboard', [AdminController::class, 'index'])->name('Dashboard');
        Route::match(['get','post'], 'password', [AdminController::class, 'password'])->name('Update Password');
        Route::match(['get','post'], 'account', [AdminController::class, 'account'])->name('Update Account');
        Route::match(['get','post'], 'approve', [AdminController::class, 'approve'])->name('Approve Vendor');
        Route::match(['get','post'], 'request-account', [AdminController::class, 'requestAccount'])->name('Update Account');
        Route::post('check-current-password', [AdminController::class, 'checkCurrentPassword']);
        Route::get('delete-admin-notes', [AdminController::class, 'deleteAdminNotes']);
        Route::get('delete-admin-image', [AdminController::class, 'deleteAdminImage']);
        Route::get('delete-vendor-notes', [AdminController::class, 'deleteVendorNotes']);
        Route::get('delete-vendor-image', [AdminController::class, 'deleteVendorImage']);
        Route::get('error/{slug}', [AdminController::class, 'error'])->name('Error');
        Route::get('logout', [AdminController::class, 'logout']);
    });
});
