<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->group(['prefix' => 'students'], function() use($router){
    $router->post('/login', 'AuthController@login');
    $router->post('/register', 'AuthController@register');
    $router->group(['middleware' => 'auth'] , function() use($router){
        $router->post('/logout', 'AuthController@logout');
        $router->get('/show', 'StudentsController@index');
        $router->post('/create', 'StudentsController@store');
        $router->put('/update/{id}', 'StudentsController@update');
        $router->delete('/delete/{id}', 'StudentsController@delete');
    });
});