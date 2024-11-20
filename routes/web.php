<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/personal/{task}', [TaskController::class, 'destroy'])->name('tasks.personal.destroy');
    Route::put('/task/update/{task}' , [TaskController::class, 'update'])->name('task.update');
   // Calendar routes
   Route::get('/calendar/create', [CalendarController::class, 'create'])->name('calendar.create');
   Route::put('/calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
   Route::delete('/calendar/delete/{id}', [CalendarController::class, 'destroy'])->name('calendar.delete');
});

require __DIR__.'/auth.php';
