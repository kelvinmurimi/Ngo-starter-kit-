<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProgramController;

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

//Gallery 
Route::prefix('gallery')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::patch('/{id}/update', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/{id}/delete', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

//programes
Route::prefix('programs')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('programs.index');
    Route::get('/create', [ProgramController::class, 'create'])->name('programs.create');
    Route::post('/store', [ProgramController::class, 'store'])->name('programs.store');
    Route::get('/{id}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
    Route::patch('/{id}/update', [ProgramController::class, 'update'])->name('programs.update');
    Route::delete('/{id}/delete', [ProgramController::class, 'destroy'])->name('programs.destroy');
});