<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\Users\UserController;

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


Route::redirect('/', '/users', '302')->name('home.redirect');

Route::get('/users', [UserController::class, 'index'])->name('users');
// Route::get('/users/{user_id}', [UserController::class, 'show'])->name('users.show')->whereNumber('user_id');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::get('/education/create', [EducationController::class, 'create'])->name('education.create');
Route::post('/education/store', [EducationController::class, 'store'])->name('education.store');

Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
Route::post('/cities/store', [CityController::class, 'store'])->name('cities.store');

