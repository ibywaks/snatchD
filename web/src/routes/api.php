<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$groupOptions = [
        'prefix'     => 'users',
        'middleware' => 'api',//|scopes:users',
        'namespace'  => 'App\Http\Controllers',
    ];

    $api->group($groupOptions, function ($api) {
        $api->get('/', 'UserController@findUser');
    });
});
