<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // CRUD routes for students
    Route::get('/dashboard/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/dashboard/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/dashboard/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/dashboard/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/dashboard/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::patch('/dashboard/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/dashboard/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

require __DIR__.'/auth.php';
