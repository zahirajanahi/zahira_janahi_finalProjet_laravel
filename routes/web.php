<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
   //Team
   Route::get('/teams', [TeamController::class, 'index'])->name('team.index');
   Route::post('/teams', [TeamController::class, 'store'])->name('team.store');
   Route::post('/teams/invitation/{teamId}', [InvitationController::class, 'store'])->name('invite.store');
   Route::get('/invitations/{id}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
   Route::get('/invitations/{id}/reject', [InvitationController::class, 'reject'])->name('invitations.reject');
   Route::get('/subscription/payment', [SubscriptionController::class, 'show'])->name('subscription.show');
    Route::post('/subscription/create-checkout-session', [SubscriptionController::class, 'createCheckoutSession'])->name('subscription.checkout');
    Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscription.success');
  
    Route::get('/subscription/payment', [SubscriptionController::class, 'show'])->name('subscription.show');
    Route::post('/subscription/create-checkout-session', [SubscriptionController::class, 'createCheckoutSession'])->name('subscription.checkout');
    Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscription.success');

    Route::get('/teams/{team}/tasks', [TeamController::class, 'getTasks'])->name('team.tasks');
});

require __DIR__.'/auth.php';
