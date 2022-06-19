<?php

Route::get('/', 'StudentController@index');
Route::post('/store', 'StudentController@store');
Route::get('/show', 'StudentController@show');