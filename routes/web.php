<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function(){
    Route::get('/', 'HomeController@index');
    
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home'); 
});

Route::get('/usuarios', 'UsuariosController@index')->middleware('auth');
Route::get('/usuarios/new', 'UsuariosController@new')->middleware('auth');
Route::post('usuarios/add', 'UsuariosController@add')->middleware('auth');
Route::get('usuarios/{id}/edit', 'UsuariosController@edit')->middleware('auth');
Route::post('usuarios/update/{id}', 'UsuariosController@update')->middleware('auth');
Route::delete('usuarios/delete/{id}', 'UsuariosController@delete')->middleware('auth');
