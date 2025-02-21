<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/about-us', [PublicController::class, 'aboutUs'])->name('aboutUs');
Route::get('/article/search', [PublicController::class, 'searchArticles'])->name('article.search');

Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

//!CATEGORY
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

//!REVISOR
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::patch('/revert/{article}', [RevisorController::class, 'revert'])->name('revert');

//!REVISOR
Route::get('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
