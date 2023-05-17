<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EducationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/education', [EducationController::class, 'index'])->name('education');
Route::get('/education/{user_id}', [EducationController::class, 'show'])->name('education.show');
Route::patch('/education/{user_id}', [EducationController::class, 'update'])->name('education.update');

Route::get('/cities', [CityController::class, 'index'])->name('cities');
Route::get('/cities/{user_id}', [CityController::class, 'show'])->name('cities.show');
