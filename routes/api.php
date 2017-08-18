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
    $cmd = 'cd /var/www;ssh-add /root/.ssh/id_rsa; /usr/bin/git fetch 2>&1;/usr/bin/git reset --hard HEAD;composer install;composer update';
    exec($cmd, $output, $return);
    return $output;
});

