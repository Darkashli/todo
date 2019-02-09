<?php

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/mylists', 'ListsController@index')->name('todo');
Route::get('/lists/view/{id}', 'ListsController@show');
Route::resource('lists', 'ListsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
