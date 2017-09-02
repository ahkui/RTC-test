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

// Route::get('deploy', function()
// {
//     ini_set('max_execution_time', 300);
//     $cmd = 'cd /var/www;composer dump-autoload -o;composer install;php artisan --version';
//     exec($cmd, $output, $return);
//     if ($return !== 0) {
//         return response($output,500);
//         // abort(500,$output);
//     }
//     return $output;
// });

// Route::post('composer', function()
// {
//     ini_set('max_execution_time', 300);
//     $cmd = 'cd /var/www;composer selfupdate && composer update';
//     exec($cmd, $output, $return);
//     if ($return !== 0) {
//         return response($output,500);
//         // abort(500,$output);
//     }
//     return $output;
// });

Route::post('deploy', function()
{
    ini_set('max_execution_time', 300);
    $cmd = 'cd /var/www;ssh-add /root/.ssh/id_rsa;/usr/bin/git fetch origin 2>&1;/usr/bin/git reset --hard origin/server 2>&1;chmod -R 777 /var/www/storage;php artisan clear-compiled;php artisan view:clear;php artisan config:clear;php artisan optimize;php artisan queue:restart';
    exec($cmd, $output, $return);
    if ($return !== 0) return response($output,500);
    return $output;
});

