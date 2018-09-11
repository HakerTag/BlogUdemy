<?php


Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('contactame', ['as' => 'contactos', 'uses' => 'PagesController@contactos']);
Route::post('contacto', 'PagesController@mensaje');

Route::get('saludos/{nombre?}', ['as' => 'saludos','uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");