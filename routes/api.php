<?php

use App\Http\Controllers\Api\GeoLocationsController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'middleware'=> 'api',
    'prefix' => 'user',
], function ($router) {
    $router->post('register', [UsersController::class, 'register']);
    $router->post('login', [UsersController::class, 'login']);
});

Route::group([
    'middleware'=> 'auth:api',
    'prefix' => 'user'
], function ($router) {
    $router->get('list', [UsersController::class, 'userList']);
    $router->post('update', [UsersController::class, 'update']);
    $router->post('role/update', [UsersController::class, 'roleUpdate']);
    $router->post('change/password', [UsersController::class, 'updatePassword']);
    $router->post('logout', [UsersController::class, 'logout']);
    $router->post('me', [UsersController::class, 'me']);
});

Route::group([
    'middleware'=> 'api',
], function ($router) {
    $router->get('divisions', [GeoLocationsController::class, 'divisions']);
    $router->get('districts', [GeoLocationsController::class, 'districts']);
    $router->get('upazilas', [GeoLocationsController::class, 'upazilas']);
});
