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
    $deployer = new \Tmd\AutoGitPull\Deployer(array(
        'allowedIpRanges' => [
            '131.103.20.160/27', // Bitbucket
            '165.254.145.0/26', // Bitbucket
            '104.192.143.0/24', // Bitbucket
            '104.192.143.192/28', // Bitbucket (Dec 2015)
            '104.192.143.208/28', // Bitbucket (Dec 2015)
            '192.30.252.0/22', // GitHub
            '192.168.0.0/16', // Local
        ],
        'directory' => '/var/www/mysite/'
    ));
    $deployer->deploy();
});

