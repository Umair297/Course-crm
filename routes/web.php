<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerControlle;
use App\Http\Controllers\UserController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user-management');
Route::get('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user-delete');
Route::post('/user-save', [App\Http\Controllers\UserController::class, 'save'])->name('user-save');
Route::post('/user-update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user-update');


Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer-management');
Route::get('/customer-delete/{id}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('customer-delete');
Route::post('/customer-save', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer-save');
Route::post('/customer-remainig-save', [App\Http\Controllers\CustomerController::class, 'store_two'])->name('customer-two-save');
Route::post('/customer-update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer-update');
Route::get('/calendar-events', [App\Http\Controllers\CustomerController::class, 'getFollowUps']);

Route::get('/comment/{id}', [CommentController::class, 'index'])->name('comment.index');
Route::post('/comment-store', [CommentController::class, 'store'])->name('comment.store');
Route::any('/comment-delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');

Route::get('/customer-status/{id}', [App\Http\Controllers\CustomerController::class, 'status'])->name('customer.status');


Route::get('/calender', [App\Http\Controllers\CalenderController::class, 'index'])->name('calender.index');

