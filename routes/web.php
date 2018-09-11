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
Route::get('report', 'ReportController@Repotvendeur');
Route::get('report/yesterday', 'ReportController@RepotvendeurHier');
Route::get('report/week', 'ReportController@RepotvendeurWeek');
Route::get('report/month', 'ReportController@RepotvendeurMonth');


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
Route::get('be_entre/vendeur/{id}','BonentreController@be_vendeur');
Route::post('be_entre','BonentreController@store');
Route::get('be_entre/{id}','BonentreController@show');
Route::get('be_entre/edit/{id}','BonentreController@edit');
Route::put('be_entre/{id}','BonentreController@update');
Route::put('be_entre/bn/{id}','BonentreController@updateBN');
route::get('be_entre/print/{id}','BonentreController@LoadPDF');


Route::post('/edetail','EdetailController@store');
Route::delete('/edetail/{id}','EdetailController@destroy');

Route::post('decharge','DechargeController@store');
Route::delete('decharge/{id}','DechargeController@destroy');

Route::get('ls_vendeurs','VendeurController@index');
Route::get('ls_vendeurs/{id}/edit','VendeurController@edit');
Route::put('ls_vendeurs/{id}','VendeurController@update');
Route::post('ls_vendeurs','VendeurController@store');
Route::delete('ls_vendeurs/{id}','VendeurController@destroy');
Route::get('backup_vendeurs','VendeurController@backup');
Route::get('backup_vendeurs/{id}','VendeurController@undelete');
Route::get('backup_vendeurs/{id}/remove','VendeurController@remove');


Route::get('stocks','StockController@index');
Route::get('stocks/in','StockController@in');
Route::get('stocks/out','StockController@out');
Route::get('stocks/perdu','StockController@perdu');
Route::post('stocks','StockController@store');


Route::get('clients','ClientController@index');
Route::get('clients/{id}','ClientController@show');
Route::get('ls_vendeurs/clients/{id}','ClientController@client_vendeur');
