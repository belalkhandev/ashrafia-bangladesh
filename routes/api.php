<?php

use App\Http\Controllers\Api\GeoLocationsController;
use App\Http\Controllers\Api\NotificationController;
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
    $router->post('show', [UsersController::class, 'userDetailsShow']);
    $router->post('update', [UsersController::class, 'update']);
    $router->post('role/update', [UsersController::class, 'roleUpdate']);
    $router->post('change/password', [UsersController::class, 'updatePassword']);
    $router->post('reset/password', [UsersController::class, 'resetPassword']);
    $router->post('logout', [UsersController::class, 'logout']);
    $router->post('me', [UsersController::class, 'me']);
    $router->get('role/list', [UsersController::class, 'roleList']);
    $router->post('delete', [UsersController::class, 'deleteUser']);
});

Route::group([
    'middleware'=> 'auth:api',
    'prefix' => 'notification'
], function ($router) {
    $router->get('/', [NotificationController::class, 'index']);
    $router->post('/create', [NotificationController::class, 'store']);
    $router->post('/edit', [NotificationController::class, 'update']);
    $router->delete('/delete', [NotificationController::class, 'destroy']);
});

$router->post('/send-notification', [NotificationController::class, 'sendNotification']);

Route::group([
    'middleware'=> 'api',
], function ($router) {
    $router->get('divisions', [GeoLocationsController::class, 'divisions']);
    $router->get('divisions', [GeoLocationsController::class, 'divisions']);
    $router->get('districts', [GeoLocationsController::class, 'districts']);
    $router->get('upazilas', [GeoLocationsController::class, 'upazilas']);
});
