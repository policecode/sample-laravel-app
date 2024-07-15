<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    // echo env('APP_ENV'); // Lấy dữ liệu trong file .env
    // echo config('app.url'); // Lấy dữ liệu trong folder config config('ten_file.key')

    return view('welcome');
});
Route::get('/demo_request', function (Request $request) {
    // echo env('APP_ENV'); // Lấy dữ liệu trong file .env
    // echo config('app.url'); // Lấy dữ liệu trong folder config config('ten_file.key')
 

    $request->fullUrlWithQuery(['type' => 'phone']);
    return response()->json([
        'path' => $request->path(),
        'url' => $request->url(),
        'fullUrl' => $request->fullUrl(),
        'method' => $request->method(),
        'header' => array(
            'X-Header-Name' => $request->header('X-Header-Name'),
            'bearerToken' => $request->header('bearerToken')
        ),
        'ip' => $request->ip(),
        'all' => $request->all(),

    ]);
});

?>