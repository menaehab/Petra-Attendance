<?php

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SessionController;

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
    Route::get('/attendance','index')->name('attendance');
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
});

Route::post('/store',[AttendanceController::class,'store'])->name('attendance.store');


Route::middleware('auth')->group(function () {

    // groups
    Route::patch('/groups/{group}/update',[GroupController::class,'update'])->name('groups.update');
    Route::resource('/groups', GroupController::class)->except(['update']);

    // students
    Route::get('/students/import', [StudentController::class, 'importPage'])->name('students.importPage');
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
    Route::resource('/students', StudentController::class)->except(['show','index']);
    Route::get('/students/show/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{id}', [StudentController::class, 'index'])->name('students.index');

    // sessions
    Route::resource('/sessions', SessionController::class);
});





















require __DIR__.'/auth.php';


// Route::fallback(function () {
//     return redirect()->route('theme.attendance');
// });
