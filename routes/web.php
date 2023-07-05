<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\TasksController;
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

Route::group(['prefix' => ''], function () {
    Route::get('/', [PagesController::class, 'home'])->name('home');
    Route::get('/tasks', [PagesController::class, 'tasks'])->name('tasks');
    Route::get('/about', [PagesController::class, 'about'])->name('about');
});

Route::post('/tasks/{task}/toggle_done', [TasksController::class, 'toggleDone'])->name('tasks.toggle_done');

Route::resource('tasks', TasksController::class);
