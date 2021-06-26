<?php

use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxLoadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Web\FrontendController;
use App\Http\Controllers\Web\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes For Frontend
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::get('logout',  [LoginController::class, 'logout'])->name('logout');

Route::get('/', [FrontendController::class, 'index'])->name('fr.home');
Route::get('/information', [FrontendController::class, 'index'])->name('fr.information');
Route::get('/register', [UsersController::class, 'register'])->name('fr.register');
Route::post('/register', [UsersController::class, 'store'])->name('fr.register.store');


/*
|--------------------------------------------------------------------------
| Web Routes for Dashboard
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*ajax loading*/
Route::group(['prefix' => 'load'], function($router) {
    $router->post('/district', [AjaxLoadController::class, 'getDistrict'])->name('get.district');
    $router->post('/upazila', [AjaxLoadController::class, 'getUpazila'])->name('get.upazila');
});

//Auth::routes();
Route::group([
    'middleware' => 'auth'
], function($route){
    $route->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    $route->get('/mureeds', [AdminController::class, 'mureeds'])->name('mureed.list');
    $route->get('/users', [AdminController::class, 'users'])->name('user.list');
    $route->get('/user/{id}/profile', [AdminController::class, 'profile'])->name('user.profile');
    $route->get('/user/{id}/profile/edit', [AdminController::class, 'profileEdit'])->name('user.profile.edit');
    $route->put('/user/{id}/profile/edit', [AdminController::class, 'profileUpdate'])->name('user.profile.update');
    $route->delete('/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('user.delete');

    $route->group(['prefix' => 'notification'], function($route) {
        $route->get('/', [NotificationsController::class, 'index'])->name('notification.list');
        $route->get('/create', [NotificationsController::class, 'create'])->name('notification.create');
        $route->post('/create', [NotificationsController::class, 'store'])->name('notification.store');
        $route->get('/edit/{notification_id}', [NotificationsController::class, 'edit'])->name('notification.edit');
        $route->put('/edit/{notification_id}', [NotificationsController::class, 'update'])->name('notification.update');
        $route->delete('/delete/{notification_id}', [NotificationsController::class, 'destroy'])->name('notification.delete');
    });

    //send notification
    $route->post('/send-notification/', [NotificationsController::class, 'sendNotification'])->name('send.notification');
});
