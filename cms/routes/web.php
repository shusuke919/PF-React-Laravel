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


///元のwebルート↓apiプレフィックスのルートは除外しておかないと、APIルートでwhereでの制約をかけたときに予期しない動作を起こす原因となる
// Route::get('{any}', function () {
//     return view('app');
// })->where('any','.*');


Route::get('/{any?}', function () {
    return view('app');
})->where('any','(?!api).+');