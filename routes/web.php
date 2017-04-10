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
    return view('pessoas.index');
});

// Route::group(['prefix' => 'pessoa'], function () {
//     Route::post('/', 'PessoaController@index');
//     Route::post('store', ['as' => 'store','uses'=>'PessoaController@store']);
// });

Route::get('pessoa/','PessoaController@index');
Route::post('pessoa/store',['as' => 'store','uses' => 'PessoaController@store']);
