<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('task', TaskController::class);    
// route for update status
Route::put('/task/{task}/update_status', [TaskController::class,'update_status'])->name('task.update_status');
