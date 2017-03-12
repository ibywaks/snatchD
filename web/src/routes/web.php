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

$groupOptions = [
	'middleware' => 'auth',
];

$router->group($groupOptions, function($router) {
	$router->get('/', function () {
	    return view('welcome');
	})->name('home');
});

$router->get('signin', 'AuthController@index')->name('signin');

$router->post('auth/token', 'SocialAuthController@issueToken')
	   ->name('auth.token');

$router->get('auth/{provider}/callback', 'AuthController@handleProviderCallback')
	   ->where('provider', 'twitter')
       ->name('auth.callback');

$router->get('auth/{provider}','AuthController@redirectToProvider')
       ->where('provider', 'twitter');

