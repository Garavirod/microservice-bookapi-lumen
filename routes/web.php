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

// Versionamiento de servicos
$router->group(['prefix'=>'/v1'],function () use ($router){
    $router->group(['prefix'=>'/books'],function () use ($router){
        /* POST */
        $router->post('/register', 'Book\BookController@storeBook');
        /* GET */
        $router->get('/list', 'Book\BookController@booksList');
        $router->get('/books/{book}', 'Book\BookController@getBook');
        /* PUT */
        $router->put('/books/{book}/','Book\BookController@updateBook');
        $router->patch('/books/{book}/','Book\BookController@updateBook');
        /* DELETE */
        $router->delete('/books/{book}/','Book\BookController@deleteBook');
    });
});