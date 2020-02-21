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

Auth::routes();

Route::get('/', 'EmpresasController@index');
Route::prefix('empresas')->group(function(){
    Route::get('/', 'EmpresasController@index');
    Route::get('/criar', 'EmpresasController@novo');
    Route::post('/', 'EmpresasController@criar');
    Route::get('/editar/{id}', 'EmpresasController@editar');
    Route::post('/update/{id}', 'EmpresasController@update');
    Route::post('/delete/{id}', 'EmpresasController@delete');
	
	Route::prefix('/{id}/fornecedores')->group(function(){
        Route::get('/', 'FornecedoresController@index');
		Route::get('/criar', 'FornecedoresController@novo');
        Route::post('/', 'FornecedoresController@criar');
        Route::get('/editar/{idf}', 'FornecedoresController@editar');
        Route::post('/update/{idf}', 'FornecedoresController@update');
        Route::post('/delete/{idf}', 'FornecedoresController@delete');
	});
});
