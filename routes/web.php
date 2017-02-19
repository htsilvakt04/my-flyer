<?php

Route::get('/', function () {
    return view("pages.home");
});
Route::resource("flyers", "FlyerController");
Route::delete("/photos/{photo}", "PhotosController@destroy");

Route::post("{zip}/{street}/photos", "PhotosController@store");
Route::get("{zip}/{street}", "FlyerController@show");

Route::get('/home', 'HomeController@index');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
