<?php

//use Ogbuechi\LaraSecure\Controllers;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Ogbuechi\LaraSecure\Controllers', 'middleware' => ['web']], function () {
    Route::any('dxxss', 'LaraSecureController@dxxss')->name('dxxss');
    Route::get(base64_decode('YWN0aXZhdGlvbi1jaGVjaw=='), 'LaraSecureController@'.base64_decode('YWN0Y2g='))->name(base64_decode('YWN0aXZhdGlvbi1jaGVjaw=='));
});
