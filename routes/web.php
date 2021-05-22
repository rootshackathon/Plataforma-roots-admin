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

//** Admin */

Auth::routes();
// auth
Route::group(['middleware' => ['auth'], "namespace" => "Admin"], function () {
    
    Route::group(['prefix' => '/'], function () {
        Route::get('/', ['uses' => 'HomeController@index']);
        Route::get('/home', ['uses' => 'HomeController@index']);
    });

    Route::group(['prefix' => '/regiao'], function () {
        Route::get('/', ['uses' => 'RegiaoController@index']);
        Route::get('/criar', ['uses' => 'RegiaoController@criar']);
        Route::get('/mostrar/{codigo}', ['uses' => 'RegiaoController@mostrar']);
        Route::post('/gravar', ['uses' => 'RegiaoController@gravar']);
    });

    Route::group(['prefix' => '/especie'], function () {
        Route::get('/', ['uses' => 'EspecieController@index']);
        Route::get('/criar', ['uses' => 'EspecieController@criar']);
        Route::get('/mostrar/{codigo}', ['uses' => 'EspecieController@mostrar']);
        Route::post('/gravar', ['uses' => 'EspecieController@gravar']);
    });

    Route::group(['prefix' => '/arvores'], function () {
        Route::get('/', ['uses' => 'ArvoreController@index']);
        Route::get('/criar', ['uses' => 'ArvoreController@criar']);
        Route::get('/mostrar/{codigo}', ['uses' => 'ArvoreController@mostrar']);
        Route::post('/gravar', ['uses' => 'ArvoreController@gravar']);
    });
    
});
