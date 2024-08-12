<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return to_route('tasl.index');
});

Route::resource('task', TaskController::class);    
// route for update status
Route::put('/task/{task}/update_status', [TaskController::class,'update_status'])->name('task.update_status');
Route::get('/regenerate', [TaskController::class,'regenerate'])->name('task.regenerate');
