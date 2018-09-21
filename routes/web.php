<?php


// App\User::create([
// 'name' => 'Daniel',
// 'email' => 'daniel@gmail.com',
// 'password' => bcrypt('123123')
// ]);
/*App\User::create([
'name' => 'Moderador',
'email' => 'moderador@gmail.com',
'password' => bcrypt('123123'),
'role' => 'moderador'
]);*/

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos','uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");

Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');

Route::get('login','Auth\LoginController@showloginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');