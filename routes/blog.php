<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;

//Tags
Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tags.index');
    Route::get('/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/', [TagController::class, 'store'])->name('tags.store');
    Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
});

//Articles
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{tag}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/{tag}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/{tag}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});
