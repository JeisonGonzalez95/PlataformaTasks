<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\taskController;
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

Route::get('/', function () {
    return view('source.sesion');
});

Route::get('app', function () {
    return view('source.sesion');
})->name('app');

Route::get('registerU', function () {
    return view('source.register');
})->name('registerU');


Route::post('/register', [loginController::class, 'registerUser'])->name('register_u');
Route::post('/login', [loginController::class, 'loginUser'])->name('login');
Route::post('/logout', [loginController::class, 'logoutUser'])->name('logout');



Route::get('index', [taskController::class, 'indxTaskList'])->name('index');

Route::get('/taskList', [taskController::class, 'taskList'])->name('taskList');
Route::post('/addTask', [taskController::class, 'taskR'])->name('addTask');
Route::post('/editTask', [taskController::class, 'taskE'])->name('editTask');
Route::get('/viewTask/{id}', [taskController::class, 'taskV'])->name('viewTask');




