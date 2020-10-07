<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

//viewing single article
//Route::get('article/{articles}',[ArticleController::class, 'show']);

//creating article
//Route::post('articles',[ArticleController::class, 'articles.store']);
//Route::post('articles/store', 'ArticlesController@store')->name('articles.store');
//->middleware('auth', 'verified')
//Route::get('get_my_articles', 'ArticleController@getmyarticles')->name('getmy.article.get');
//Route::post('articles', 'ArticleController@store')->name('savearticle');
Route::get('articles/my', [ArticleController::class, 'getmyarticles']);
//Route::get('myarticles', 'ArticleController@getmyarticles')->name('getmy.articles');
//Route::get('get_my_articles', [ArticleController::class, 'getmyarticles'])->name('getmyarticles');
Route::resource('articles', ArticleController::class);
