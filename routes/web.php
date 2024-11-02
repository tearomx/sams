<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;

Route::get('/leave', [LeaveController::class, 'create'])->name('leave.create');
Route::post('/leave/submit', [LeaveController::class, 'submit'])->name('leave.submit');
