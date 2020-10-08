<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Articles;

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
    $articles = new Articles;
    return view('articles', [
        'articles' => $articles->getArticles()
    ]);

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');




Route::get('/articles/{articles_id}', function ($articles_id) {
    $articles = new Articles;
    return view('article', [
        'article' => $articles->getArticle($articles_id)
    ]);
})->name('article.show');


Route::get('/myarticles', [ArticleController::class, 'getmyarticles']);
Route::post('/deletearticle',[ArticleController::class, 'deletearticle']);


Route::resource('articles', ArticleController::class)->except(['destroy']);
