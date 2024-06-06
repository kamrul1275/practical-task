<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



Route::middleware('User')->group(function(){

    Route::get('/dashboard',[UserController::class,'UserDashboard'])->name('dashboard');


});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/',[UserController::class,'Index'])->name('index');
Route::get('/search',[UserController::class,'SearchResult'])->name('search');

// Admin Authentication
Route::get('/admin/login',[AdminController::class,'AdminLoginForm']); 




Route::middleware(['Admin'])->group(function () {
    
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard'); 
    Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');

    

    //admin profile
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');



});

