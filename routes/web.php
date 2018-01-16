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

Route::get('/home', 'HomeController@index')->name('home');

