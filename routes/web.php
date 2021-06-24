<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxLoadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
    $route->get('/alluser', [AdminController::class, 'userList'])->name('user.list');
    $route->get('/mureeds', [AdminController::class, 'mureedUserList'])->name('mureed.user.list');
    $route->get('/superadminuser', [AdminController::class, 'superUserList'])->name('super.user.list');
    $route->get('/adminuser', [AdminController::class, 'adminUserList'])->name('admin.user.list');
});
