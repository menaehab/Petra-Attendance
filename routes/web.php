<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

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

Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('/', [ThemeController::class,'index'])->name('dashboard');

    // groups
    Route::patch('/groups/{group}/update',[GroupController::class,'update'])->name('groups.update');
    Route::resource('/groups', GroupController::class)->except(['update']);

    // students
    Route::get('/students/import', [StudentController::class, 'importPage'])->name('students.importPage');
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
    Route::resource('/students', StudentController::class)->except(['show','index','update']);
    Route::patch('/students/{student}/update', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/show/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{id}', [StudentController::class, 'index'])->name('students.index');

    // sessions
    Route::resource('/sessions', SessionController::class)->names('sessions');

    // attendance
    Route::get('/attendance', [AttendanceController::class,'index'])->name('attendance');
});

require __DIR__.'/auth.php';
