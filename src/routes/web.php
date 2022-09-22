<?php

use Ogbuechi\laraSecure\Controllers;
use Illuminate\Support\Facades\Route;

Route::any('dxxss', 'LaraSecureController@dxxss')->name('dxxss');
Route::get(base64_decode('YWN0aXZhdGlvbi1jaGVjaw=='), 'LaraSecureController@'.base64_decode('YWN0Y2g='))->name(base64_decode('YWN0aXZhdGlvbi1jaGVjaw=='));
