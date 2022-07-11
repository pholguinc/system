<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Attendance;
use App\Models\Student;
use App\Models\Teacher;
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

Route::get('/admin', function () {
    return view('admin.home.index');
});



/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard');
    })->name('admin.index');
});*/

//Route Hooks - Do not delete//
	Route::view('semesters', 'livewire.semesters.index')->middleware('auth');
	Route::view('teachers', 'livewire.teachers.index')->middleware('auth');
    Route::view('teachers/attendance', 'livewire.teachers.modules.attendance.index')->middleware('auth');
	Route::get('teachers/attendance', [Attendance::class, 'render']);
    Route::view('courses', 'livewire.courses.index')->middleware('auth');
    /*Route::get('teachers', function () {
    $teachers = Teacher::with('courses')->get();
        return $teachers;
    })->name('admin.index');*/
	Route::view('levels', 'livewire.levels.index')->middleware('auth');
	Route::view('students', 'livewire.students.index')->middleware('auth');
    Route::view('users', 'livewire.users.index')->middleware('auth');
    Route::get('/admin', [HomeController::class, 'index']);

/*Auth::routes();*/

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
