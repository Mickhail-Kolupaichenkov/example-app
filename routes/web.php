<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/**
 * Приветствие
 */
Route::get('/', fn() => inertia('Page/Home'))->middleware('auth');

/**
 * Пользователи
 */
Route::get('/login/', [UserController::class, 'login'])->name('login');
Route::post('/login/', [UserController::class, 'loginPost']);
Route::middleware('auth')->group(function () {
    Route::post('/logout/', [UserController::class, 'logout']);
    Route::resource('users', UserController::class)->scoped(['user' => 'username']);
})->where(['user' => '[a-zA-Z0-9]+']);

/**
 * Проекты (только для авторизованных)
 */
Route::middleware('auth')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show')
        ->where('project', '[0-9]+');

    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});
