<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/filter-blogs', [BlogController::class, 'filter'])->name('blog.filter');

Route::prefix('admin')->group(function () {
    Route::get('/', [BlogController::class, 'adminIndex'])->name('admin.index');
    Route::get('/create', [BlogController::class, 'create'])->name('admin.create');
    Route::post('/store', [BlogController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('admin.edit');
    Route::post('/update/{id}', [BlogController::class, 'update'])->name('admin.update');
    Route::get('/delete/{id}', [BlogController::class, 'destroy'])->name('admin.destroy');
});