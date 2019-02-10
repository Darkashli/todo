<?php

Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/lists', 'ListsController@index')->name('todo');
Route::get('/lists/view/{id}', 'ListsController@show');
Route::resource('lists', 'ListsController');
Route::get('/error', 'PagesController@error')->name('error');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/admin', 'AdminController@index')->middleware('is_admin')->name('admin');
