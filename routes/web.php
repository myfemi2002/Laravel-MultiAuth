<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Middleware\RedirectIfAuthenticated;

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

// Prevent Back Starts Here
Route::group(['middleware' => 'prevent-back-history'],function(){

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Start Middleware
Route::middleware('auth')->group(function(){

// Admin Management All Routes Starts
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
    Route::get('/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

}); // Admin Management All Routes Ends

// All Login Route
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);
Route::get('/manager/login', [ManagerController::class, 'ManagerLogin'])->name('manager.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login')->middleware(RedirectIfAuthenticated::class);

// Manager Dashboard Management All Routes Starts
Route::prefix('manager')->middleware(['auth','role:manager'])->group(function() {

    Route::get('/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashobard');
    Route::get('/logout', [ManagerController::class, 'ManagerDestroy'])->name('manager.logout');

    Route::get('/profile', [ManagerController::class, 'ManagerProfile'])->name('manager.profile');
    Route::post('/profile/store', [ManagerController::class, 'ManagerProfileStore'])->name('manager.profile.store');
    Route::get('/change/password', [ManagerController::class, 'ManagerChangePassword'])->name('manager.change.password');
    Route::post('/update/password', [ManagerController::class, 'ManagerUpdatePassword'])->name('manager.update.password');

}); // Manager End Middleware

// User Dashboard Management All Routes Starts
Route::prefix('user')->middleware(['auth','role:user'])->group(function() {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashobard');
    Route::get('/logout', [UserController::class, 'UserDestroy'])->name('user.logout');

    Route::get('/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');

}); // Manager End Middleware

}); //prevent-back-history








































}); //End Middleware
