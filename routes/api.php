<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





Route::post('deploy', function()
{
    $cmd = 'whoami;cd /var/www ;/usr/bin/git pull 2>&1';
    $exec = exec($cmd, $output, $return);
    return [$exec,$output,$return];
});

