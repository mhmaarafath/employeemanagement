<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TimeController;
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

Auth::routes();
Route::get('register', function(){
    return redirect()->route('login');
});
Route::get('password/reset', function(){
    return redirect()->route('login');
});



Route::group([
    'middleware' => ['auth']

], function(){

    Route::group([
        'middleware' => ['admin']
    ],function(){
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');

        Route::delete('users/{user}', [UserController::class, 'softdelete'])->name('users.softdelete');
        Route::get('users', [UserController::class, 'index'])->name('users.index');
    });
    
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/{user}', [UserController::class, 'update'])->name('users.update');
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/', [DashboardController::class, 'index']);

    Route::post('times', [TimeController::class, 'store'])->name('times.store');

});
