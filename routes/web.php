<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ShopsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.home');
})->name('home');

Route::get('/about', function () {
    return view('main.about');
})->name('about');


Route::group(
[
    'prefix' => 'city',
    //'namespace' => config('admin.route.namespace'),
    //'middleware' => config('admin.route.middleware'),
    'as' => 'city.',
], function (Illuminate\Routing\Router $routers) {
    $routers->get('/', [CityController::class, 'list'])->name('list');
    $routers->get('/view/{id}', [CityController::class, 'view'])->whereNumber('id')->name('view');
    $routers->post('/search', [CityController::class, 'search'])->name('search');


});
Route::group(
[
    'prefix' => 'shop',
    'as' => 'shop.',
], function (Illuminate\Routing\Router $routers) {
    $routers->get('/view/{id}', [ShopsController::class, 'view'])->whereNumber('id')->name('view');
    $routers->get('/', [ShopsController::class, 'list'])->name('list');

});

