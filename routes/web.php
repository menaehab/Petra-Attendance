<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Models\Attendance;
use App\Models\Student;
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







Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/','index')->name('attendance');
   Route::get('/dashboard/{level?}', 'dashboard')->name('dashboard')->middleware('auth');
    Route::get('/student','student')->name('studentdetails')->middleware('auth');
});

Route::post('/store',[AttendanceController::class,'store'])->name('attendance.store');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::fallback(function () {
    return redirect()->route('theme.attendance');
});
