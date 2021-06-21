<?php

use App\Http\Controllers\Auth\LoginController;
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
Route::post('login', [LoginController::class, 'login']);
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

//Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('fr.dashboard');
