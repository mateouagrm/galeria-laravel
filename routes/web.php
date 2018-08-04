<?php
// get pones la url manualmente funciona
// post si o si tiene q ser mediante una peticion
// los post solo funciona con los formularios
Route::get('/aplicacion','pruebaController@personalizado'); 
Route::get('/', function () {
//	return "hola";
    return view('layouts.app'); 
});



Route::get('/para/{nombre}/{edad}','pruebaController@parametro'); 


//galeria
Route::get('/galeria','galeriaController@listarGaleria'); 

//login
Route::get('/login','Auth\AuthController@getLogin'); 
Route::post('/login','Auth\AuthController@postLogin'); 

//registro
Route::get('/register','Auth\AuthController@register');
Route::post('/register','Auth\AuthController@postRegister');

//salir
Route::get('/logout','Auth\AuthController@getLogout');
Route::post('/logout','Auth\AuthController@getLogout');


//Route::get('/', ['as' => 'auth/login', 'uses' => 'Auth\AuthController@getLogin']);   
//Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);   
//Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']); 


//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home'); 
