<?php

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

Route::get('/', 'WelcomeContorller@index');

Route::post('/detail','DetailController@store');
Route::delete('/detail/{id}','DetailController@destroy');


Route::get('/articles','ArticleController@index');
Route::get('/articles/create','ArticleController@create');
Route::post('/articles','ArticleController@store');
Route::delete('/articles/{id}','ArticleController@destroy');
Route::get('/articles/{id}','ArticleController@edit');
Route::put('/articles/{id}','ArticleController@update');
Route::get('articles/depot/{id}','ArticleController@artdepot');

Route::get('/bs_sortie','BonsortieController@index');
Route::get('/bs_sortie/vendeur/{id}','BonsortieController@bs_vendeur');
Route::post('/bs_sortie','BonsortieController@store');
Route::get('/bs_sortie/{id}','BonsortieController@show');
route::get('/bs_sortie/print/{id}','BonsortieController@LoadPDF');
Route::delete('/bs_sortie/{id}','BonsortieController@destroy');
Route::get('/backup_bonsorties','BonsortieController@backup');
Route::get('/backup_bonsorties/{id}','BonsortieController@undelete');
Route::get('/backup_bonsorties/{id}/remove','BonsortieController@remove');


Route::get('be_entre','BonentreController@index');
Route::post('be_entre','BonentreController@store');

Route::get('/ls_vendeurs','VendeurController@index');
Route::get('/ls_vendeurs/{id}/edit','VendeurController@edit');
Route::put('/ls_vendeurs/{id}','VendeurController@update');
Route::post('/ls_vendeurs','VendeurController@store');
Route::delete('/ls_vendeurs/{id}','VendeurController@destroy');
Route::get('/backup_vendeurs','VendeurController@backup');
Route::get('/backup_vendeurs/{id}','VendeurController@undelete');
Route::get('/backup_vendeurs/{id}/remove','VendeurController@remove');


Route::get('stocks','StockController@index');
Route::get('stocks/in','StockController@in');
Route::get('stocks/out','StockController@out');
Route::get('stocks/perdu','StockController@perdu');
Route::post('stocks','StockController@store');

Route::get('/bs_entrer', function () {
    return view('bs_entrer');
});
