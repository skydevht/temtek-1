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

$router->post('/auth/login', 'AuthController@postLogin');
$router->get('/auth/facebook', 'AuthController@redirectToFacebook');
$router->get('/auth/facebook/handle', 'AuthController@handleFacebookConnect');

$router->group(['middleware' => 'auth:api'], function($router)
{
    $router->get('/test', function() {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    });
});
