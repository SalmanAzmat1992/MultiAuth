<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth','verified','superadmin'])->group(function (){

    Route::get('/superAdmin/dashboard',[SuperAdminController::class,'SuperAdminDashboard'])->name('superAdmin.dashboard');
    Route::get('/superAdmin/page1',[SuperAdminController::class,'Page1'])->name('superAdmin.page1');
});

Route::middleware(['auth','verified','admin'])->group(function (){
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth','verified','manager'])->group(function (){

    Route::get('/manager/dashboard',[ManagerController::class,'ManagerDashboard'])->name('manager.dashboard');

});
Route::middleware(['auth','verified','staff'])->group(function (){

    Route::get('/staff/dashboard',[StaffController::class,'StaffDashboard'])->name('staff.dashboard');

});

Route::get('/blockUser',function (){
    return view('extras.block_user');
})->name('block.user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
