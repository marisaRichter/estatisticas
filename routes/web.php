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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'comunidades', 'where'=>['id'=>'[0-9]+']], function() {
  Route::get('', ['as'=>'comunidades', 'uses'=>'ComunidadesController@index']);
  Route::get('create', ['as'=>'comunidades.create', 'uses'=>'ComunidadesController@create']);
  Route::post('store', ['as'=>'comunidades.store', 'uses'=>'ComunidadesController@store']);
  Route::get('{id}/destroy', ['as'=>'comunidades.destroy', 'uses'=>'ComunidadesController@destroy']);
  Route::get('{id}/edit', ['as'=>'comunidades.edit', 'uses'=>'ComunidadesController@edit']);
  Route::put('{id}/update', ['as'=>'comunidades.update', 'uses'=>'ComunidadesController@update']);
});

Route::group(['prefix'=>'tipos-de-eventos', 'where'=>['id'=>'[0-9]+']], function() {
  Route::get('', ['as'=>'tipos-de-eventos', 'uses'=>'TiposDeEventosController@index']);
  Route::get('create', ['as'=>'tipos-de-eventos.create', 'uses'=>'TiposDeEventosController@create']);
  Route::post('store', ['as'=>'tipos-de-eventos.store', 'uses'=>'TiposDeEventosController@store']);
  Route::get('{id}/destroy', ['as'=>'tipos-de-eventos.destroy', 'uses'=>'TiposDeEventosController@destroy']);
  Route::get('{id}/edit', ['as'=>'tipos-de-eventos.edit', 'uses'=>'TiposDeEventosController@edit']);
  Route::put('{id}/update', ['as'=>'tipos-de-eventos.update', 'uses'=>'TiposDeEventosController@update']);
});

Route::group(['prefix'=>'pastores', 'where'=>['id'=>'[0-9]+']], function() {
  Route::get('', ['as'=>'pastores', 'uses'=>'PastoresController@index']);
  Route::get('create', ['as'=>'pastores.create', 'uses'=>'PastoresController@create']);
  Route::post('store', ['as'=>'pastores.store', 'uses'=>'PastoresController@store']);
  Route::get('{id}/destroy', ['as'=>'pastores.destroy', 'uses'=>'PastoresController@destroy']);
  Route::get('{id}/edit', ['as'=>'pastores.edit', 'uses'=>'PastoresController@edit']);
  Route::put('{id}/update', ['as'=>'pastores.update', 'uses'=>'PastoresController@update']);
});

Route::group(['prefix'=>'users', 'where'=>['id'=>'[0-9]+']], function() {
  Route::get('', ['as'=>'users', 'uses'=>'UsersController@index']);
  Route::get('create', ['as'=>'users.create', 'uses'=>'UsersController@create']);
  Route::post('store', ['as'=>'users.store', 'uses'=>'UsersController@store']);
  Route::get('{id}/destroy', ['as'=>'users.destroy', 'uses'=>'UsersController@destroy']);
  Route::get('{id}/edit', ['as'=>'users.edit', 'uses'=>'UsersController@edit']);
  Route::put('{id}/update', ['as'=>'users.update', 'uses'=>'UsersController@update']);
});

Route::group(['prefix'=>'eventos', 'where'=>['id'=>'[0-9]+']], function() {
  Route::get('', ['as'=>'eventos', 'uses'=>'EventosController@index']);
  Route::get('create', ['as'=>'eventos.create', 'uses'=>'EventosController@create']);
  Route::post('store', ['as'=>'eventos.store', 'uses'=>'EventosController@store']);
  Route::get('{id}/destroy', ['as'=>'eventos.destroy', 'uses'=>'EventosController@destroy']);
  Route::get('{id}/edit', ['as'=>'eventos.edit', 'uses'=>'EventosController@edit']);
  Route::put('{id}/update', ['as'=>'eventos.update', 'uses'=>'EventosController@update']);
});
