<?php

use App\Admin\Controllers\CityController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('city', CityController::class);

//    $router->get('/city', 'CityController@index')->name('city');
//    $router->get('/city/{id}', 'CityController@detail')->name('city.detail');
//    $router->get('/city/{id}/edit', 'CityController@edit')->name('city.edit');

//    Route::group([
//        'prefix' => 'city',
//        'as' => 'city' . '.',
//    ], function (Router $router2) {
//        $router2->get('/', 'CityController@index')->name('city');
//        $router2->get('/show', 'CityController@show')->name('show');
////        $router2->get('/edit', 'CityController@edit')->name('edit');
////        $router2->get('/delete', 'CityController@delete')->name('delete');
//    });




});
