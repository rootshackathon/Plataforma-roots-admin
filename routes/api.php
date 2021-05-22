<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api', "namespace" => "Api"], function() {

    Route::group(['prefix' => '/login'], function() {
        Route::post('/', 'LoginController@login');
    });

    Route::group(['prefix' => '/especie'], function() {
        Route::get('/', 'EspecieController@index');
    });

    Route::group(['prefix' => '/arvore'], function() {
        Route::get('/', 'ArvoreController@index');
        Route::get('/{codigo}', 'ArvoreController@mostrar');
        Route::post('/', 'ArvoreController@gravar');

        Route::group(['prefix' => '/tipoSituacaoArvore'], function() {
            Route::get('/', 'TipoSituacaoArvoreController@index');
        });
    
        Route::group(['prefix' => '/situacaoArvore'], function() {
            Route::post('/', 'SituacaoArvoreController@gravar');
        });
    });

});
