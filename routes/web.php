<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
	return $router->app->version();
});

$router->group(['prefix' => 'v1'], function () use ($router) {

	//Authentication
	$router->post('/login', 'LoginController@login');
	$router->post('/register', 'UserController@register');
	$router->get('/user', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);

});

// Only use when generating a random string key for this api
// $router->get('/key', function () use ($router) {
//     return str_random(32); 
// });
