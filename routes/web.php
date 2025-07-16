<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TaskController;

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
    Route::patch('/groups/{group}/update',[GroupController::class,'update'])->name('groups.update')->middleware('role:admin');
    Route::resource('/groups', GroupController::class)->except(['update']);

    // students
    Route::get('/students/import', [StudentController::class, 'importPage'])->name('students.importPage')->middleware('role:admin');
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import')->middleware('role:admin');
    Route::resource('/students', StudentController::class)->except(['show','index','update'])->middleware('role:admin');
    Route::patch('/students/{student}/update', [StudentController::class, 'update'])->name('students.update')->middleware('role:admin');
    Route::get('/students/show/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{id}', [StudentController::class, 'index'])->name('students.index');

    // sessions
    Route::resource('/sessions', SessionController::class)->names('sessions');

    // attendance
    Route::get('/attendance', [AttendanceController::class,'index'])->name('attendance');
    Route::get('/attendance/{student}/{session_id}/{status}', [WhatsAppController::class, 'attendance'])->name('attendance.whatsapp');

    // tasks
    Route::get('/tasks/{task}/students/{student}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';