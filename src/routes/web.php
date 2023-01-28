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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function() use ($router) {
    $router->get('/dokter', ['uses' => 'DokterController@index']);
    $router->post('/dokter', ['uses' => 'DokterController@create']);
    $router->get('/dokter/{id}', ['uses' => 'DokterController@show']);
    $router->put('/dokter/{id}', ['uses' => 'DokterController@update']);
    $router->delete('/dokter/{id}', ['uses' => 'DokterController@destroy']);



    $router->get('/pasien', ['uses' => 'PasienController@index']);
    $router->post('/pasien', ['uses' => 'PasienController@create']);
    $router->get('/pasien/{id}', ['uses' => 'PasienController@show']);
    $router->put('/pasien/{id}', ['uses' => 'PasienController@update']);
    $router->delete('/pasien/{id}', ['uses' => 'PasienController@destroy']);

  
    
});
