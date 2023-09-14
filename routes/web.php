<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // echo env('APP_ENV'); // Lấy dữ liệu trong file .env
    // echo config('app.url'); // Lấy dữ liệu trong folder config config('ten_file.key')
    return view('welcome');
});
