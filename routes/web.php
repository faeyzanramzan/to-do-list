<?php

use Illuminate\Support\Facades\Route;



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

// Route::get('/', function () {
//     $activities = \App\Models\Activity::all();
//     return view('index' ,compact('activities'));
// });

 
Route::get('/', [App\Http\Controllers\ActivityController::class, 'index'])->name('dashboard');
Route::get('/create', [App\Http\Controllers\ActivityController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\ActivityController::class, 'store'])->name('store');
Route::get('/edit/{activity}', [App\Http\Controllers\ActivityController::class, 'edit'])->name('edit');
Route::put('/update/{activity}', [App\Http\Controllers\ActivityController::class, 'update'])->name('update');
Route::delete('/delete/{activity}', [App\Http\Controllers\ActivityController::class, 'destroy'])->name('delete');


