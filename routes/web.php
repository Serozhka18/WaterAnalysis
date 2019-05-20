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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect()->route('results');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('users');
        Route::get('/edit/{id}', 'UserController@editForm')->name('users.edit')->where('id', '[0-9]+');
        Route::put('/edit/{id}', 'UserController@update')->name('users.update')->where('id', '[0-9]+');
        Route::get('/delete/{id}', 'UserController@delete')->name('users.delete')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'results'], function () {
        Route::get('/', 'ResultController@index')->name('results');
        Route::get('/{id}', 'ResultController@show')->name('results.show')->where('id', '[0-9]+');
        Route::get('/edit/{id}', 'ResultController@editForm')->name('results.edit')->where('id', '[0-9]+');
        Route::put('/edit/{id}', 'ResultController@update')->name('results.update')->where('id', '[0-9]+');
        Route::get('/add', 'ResultController@addForm')->name('results.add');
        Route::post('/', 'ResultController@save')->name('results.save');
        Route::get('/delete/{id}', 'ResultController@delete')->name('results.delete')->where('id', '[0-9]+');
    });
});
