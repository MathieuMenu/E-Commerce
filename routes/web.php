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

Route::get('/', 'IndexController@index')->name('home');

Route::post('/', 'IndexController@index2')->name('home2');

Route::get('/panier', 'PanierController@panier')->name('home3');

Route::post('/panier', 'PanierController@valider')->name('home4');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home5');

Route::get('/produit', 'ProduitController@index')->name('home6');

Route::get('/produit/add', 'ProduitaddController@index')->name('home7');

Route::post('/produit/add', 'ProduitaddController@post')->name('home8');

Route::post('/produit/modif', 'ProduitmodifController@index2')->name('home9');

Route::get('/produit/modif', 'ProduitmodifController@index')->name('home10');

Route::post('/produit/modif/execute', 'ProduitmodifController@index3')->name('home11');

Route::post('/produit/supp', 'ProduitsuppController@index')->name('home12');

Route::get('/client', 'ClientController@index')->name('home13');


