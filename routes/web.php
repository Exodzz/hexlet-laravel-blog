<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/about', [PageController::class, 'about'])
    ->name('about');

Route::post('/articles', [ArticleController::class, 'store'])
    ->name('articles.store');

Route::get('/article', [ArticleController::class, 'index'])
    ->name('article.index');

Route::get('article/create', [ArticleController::class , 'create'])
    ->name('article.create');
//Запрос формы
Route::get('article/{id}/edit', [ArticleController::class , 'edit'])
    ->name('article.edit');

//Роут обновления
Route::patch('article/{id}', [ArticleController::class , 'update'])
    ->name('article.update');

Route::delete('article/{id}/del', [ArticleController::class, 'destroy'])
    ->name('article.destroy');

Route::get('/article/{id}', [ArticleController::class, 'show'])
    ->name('article.show');
