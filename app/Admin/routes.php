<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Input;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    //$router->resource('users',UserController::class);
    $router->resource('reader',ReaderController::class);
    $router->resource('tags',TagController::class);
    $router->resource('tasks',TaskController::class);


});
Route::get('chart', function(){
    $stats = DB::table('chartBar')->select('y','a','b')->get();
    return $stats;
});

Route::get('chart1', function(){
    // Get the number of days to show data for, with a default of 7
    //$days = Input::get('days', 7);

    //$range = \Carbon\Carbon::now()->subDays($days);

    $stats = DB::table('chartRadios')->select('label','value')->get();
    return $stats;
});

