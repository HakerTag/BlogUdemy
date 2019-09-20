<?php
// Route::get('job', function(){
// 	dispatch(new App\Jobs\SendEmail);
// 	return "Listo";
// });
// App\User::create([
// 'name' => 'admin',
// 'email' => 'admin@gmail.com',
// 'password' => bcrypt('123123')
// ]);
// App\User::create([
// 'name' => 'Moderador',
// 'email' => 'moderador@gmail.com',
// 'password' => bcrypt('123123'),
// 'role_id' => '2'
// ]);

// Route::get('roles', function()
// {
// 	return \App\Role::with('user')->get();
// });
// DB::listen(function($query){
// 	echo "<pre>{$query->sql}</pre>";
// });

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');
Route::get('login','Auth\LoginController@showloginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');