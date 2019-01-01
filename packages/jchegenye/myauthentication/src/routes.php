<?php

$router->group(['prefix' => 'v1'], function () use ($router) {

	//Authentication
	$router->post('/login', 'LoginController@login');
	$router->post('/register', 'UserController@register');
	$router->get('/user', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);

});

// Route::group(['namespace' => 'Jchegenye\MyAuthentication\Controllers'], function(){
	
// 	Route::get('/profile', ['uses' =>  'UserController@showProfile']);

// 	//Authentication
// 	Route::group(['prefix' => 'v1'], function () {
// 		Route::post('/login', 'LoginController@login');
// 		Route::post('/register', 'UserController@register');
// 		Route::get('/user', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);
// 	});

// });