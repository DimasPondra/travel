<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PackagePageController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomePageController::class, 'index'])->name('home-page');
Route::get('packages', [PackagePageController::class, 'index'])->name('package-page');
Route::get('packages/{package:slug}', [PackagePageController::class, 'show'])->name('detail-package-page');

/** Auth */
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'loginPage'])->name('auth.login-page');
    Route::post('login', [AuthController::class, 'authenticate'])->name('auth.login-process');

    Route::get('register', [AuthController::class, 'registerPage'])->name('auth.register-page');
    Route::post('register', [AuthController::class, 'registerProcess'])->name('auth.register-process');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('checkout')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    });
});

/** User Panel */
Route::prefix('dashboard')->middleware('user')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('dashboard.profile');
    Route::patch('profile-update', [ProfileController::class, 'update'])->name('dashboard.profile-update');
    Route::patch('photo-profile-update', [ProfileController::class, 'photoUpdate'])->name('dashboard.photo-profile-update');
    Route::patch('change-password', [ProfileController::class, 'changePassword'])->name('dashboard.change-password');
});

/** Admin Panel */
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    /** Customers */
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('admin.customers.index');
    });

    /** Packages */
    Route::prefix('packages')->group(function () {
        Route::get('/', [PackageController::class, 'index'])->name('admin.packages.index');
        Route::get('create', [PackageController::class, 'create'])->name('admin.packages.create');
        Route::post('store', [PackageController::class, 'store'])->name('admin.packages.store');
        Route::get('{package}/show', [PackageController::class, 'show'])->name('admin.packages.show');
        Route::get('{package}/edit', [PackageController::class, 'edit'])->name('admin.packages.edit');
        Route::patch('{package}/update', [PackageController::class, 'update'])->name('admin.packages.update');
        Route::delete('{package}/delete', [PackageController::class, 'destroy'])->name('admin.packages.delete');

        /** Image */
        Route::get('{package}/add-image', [PackageController::class, 'addImage'])->name('admin.packages.add-image');
        Route::post('{package}/upload-image', [PackageController::class, 'uploadImage'])->name('admin.packages.upload-image');
        Route::delete('{package}/{image}/delete-image', [PackageController::class, 'deleteImage'])->name('admin.packages.delete-image');
    });
});
