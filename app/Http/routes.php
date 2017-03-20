<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::group(['middleware' => ['web'], 'prefix' => 'panel'], function () {
	Route::get('/', 'Auth\BackController@index');
	Route::post('/', 'Auth\AuthController@login');
	Route::get('logout', 'Auth\AuthController@logout');
	Route::group(['middleware' => ['auth']], function () {
		Route::get('general', 'Auth\BackController@general');
		Route::resource('tipo_noticias', 'Auth\TypeNewsController');
		Route::get('type_news/{id}', 'Auth\TypeNewsController@show');
		Route::get('type_news', 'Auth\TypeNewsController@listing');
		Route::resource('noticias', 'Auth\NewsController');
		Route::get('news/{id}', 'Auth\NewsController@show');
        Route::get('news', 'Auth\NewsController@listing');

    });
});

Route::group(['prefix' => '/'], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/noticias', 'HomeController@news');
	Route::get('/faq', 'HomeController@faq');
	Route::get('/cursos', 'HomeController@courses');
	Route::get('/empresas', 'HomeController@business');
	Route::get('/noticia/{id}', 'HomeController@showNews');
});
