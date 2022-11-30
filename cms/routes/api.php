<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login/{provider}', 'Api\OAuthController@getProviderOAuthURL')
            ->where('provider', 'github')->name('oauth.request');