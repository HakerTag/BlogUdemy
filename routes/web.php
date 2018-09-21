<?php

// App\User::create([
// 'name' => 'Daniel',
// 'email' => 'daniel@gmail.com',
// 'password' => bcrypt('123123')
// ]);

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos','uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");

Route::resource('mensajes','MessagesController');

Route::get('login','Auth\LoginController@showloginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');