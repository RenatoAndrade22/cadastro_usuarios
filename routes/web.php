<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('list.user');

Route::prefix('usuario')->group(function () {

    Route::get('novo', [UserController::class, 'register'])->name('register.user');

    Route::get('editar/{id}', [UserController::class, 'show'])->name('show.user');

    Route::post('cadastrar', [UserController::class, 'store'])->name('store.user');

    Route::put('editar/{id}', [UserController::class, 'update'])->name('update.user');

    Route::delete('excluir/{id}', [UserController::class, 'destroy'])->name('destroy.user');
});

