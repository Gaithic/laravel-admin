<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'mainIndex'])->name('/');
Route::get('/registerView', [AuthController::class, 'userRegisterView'])->name('/registerView');
Route::post('/save-user', [AuthController::class, 'userRegister'])->name('/save-user');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/user-login', [AuthController::class, 'userLogin'])->name('user-login');


Route::group(['prefix' => 'users'], function(){
Route::get('/index', [AuthController::class, 'userDashboard'])->name('/index');
Route::get('/logout', [AuthController::class, 'logout'])->name('/logout');
Route::get('/user-index', [AuthController::class, 'userView'])->name('user-index');

});


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');
});


Route::group(['prefix' => 'post', [PostController::class, 'createPost']], function(){
    Route::get('/create', [PostController::class, 'createPost'])->name('create-post');
    Route::post('/save', [PostController::class, 'savePost'])->name('save-post');
    
});


