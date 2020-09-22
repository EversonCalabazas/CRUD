<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function(){
    Route::get('/', 'HomeController@index');
    
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home'); 
});

Route::get('/usuarios', 'UsuariosController@index');
Route::get('/usuarios/new', 'UsuariosController@new');
Route::post('usuarios/add', 'UsuariosController@add');
Route::get('usuarios/{id}/edit', 'UsuariosController@edit');
Route::post('usuarios/update/{id}', 'UsuariosController@update');
Route::delete('usuarios/delete/{id}', 'UsuariosController@delete');
