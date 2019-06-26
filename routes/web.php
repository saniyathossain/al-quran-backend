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

$router->group(['prefix' => 'api/v1', 'middleware' => ['cors']], function () use ($router) {
    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('chapters', [
        'as' => 'getChaptersList',
        'uses' => 'MainController@getChapters'
    ]);

    $router->get('chapters/{id}', [
        'as' => 'getChapter',
        'uses' => 'MainController@getChapter'
    ]);
});
