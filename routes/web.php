<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
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
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/save-user', [AuthController::class, 'userRegister'])->name('/save-user');
Route::post('/user-login', [AuthController::class, 'userLogin'])->name('user-login');
Route::get('/forget-password', [ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('/forget-password', [ForgotPasswordController::class,  'postEmail'])->name('forget-email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('update-password');
Route::post('/reset-password', [ResetPasswordController::class,'updatePassword'])->name('reset-password');



Route::group(['prefix' => 'users', 'middleware' => ['admin']], function(){
Route::get('/index', [AuthController::class, 'userDashboard'])->name('/index');
Route::get('/logout', [AuthController::class, 'logout'])->name('/logout');
Route::get('/user-index', [AuthController::class, 'userView'])->name('user-index');
Route::get('/user-dashboard', [UserController::class, 'userDashboard'])->name('user-dashboard');
Route::get('/user-edit-post/{id}', [UserController::class, 'editOwnPost'])->name('user-edit-post');

});


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');
    Route::post('/create/user', [AdminController::class, 'createUser'])->name('create-user');
    Route::get('/manage/users', [AdminController::class, 'manageUesers'])->name('manage-uesers');
    Route::get('/manage/post', [AdminController::class, 'managePost'])->name('manage-post');
    Route::get('/edit-users/{id}', [AdminController::class, 'editUsers'])->name('edit-users');
    Route::put('/admin-update-user/{id}', [AdminController::class, 'updateUsers'])->name('update-user');
    Route::put('/admin-update-post/{id}', [AdminController::class, 'adminEditPost'])->name('admin-update-post');
    Route::get('/edit/{id}', [PostController::class, 'editPost'])->name('edit-post');
    Route::get('/create/user', [AdminController::class, 'createUserView'])->name('create.user');

});


Route::group(['prefix' => 'post', [PostController::class, 'createPost']], function(){
    Route::get('/create', [PostController::class, 'createUserPost'])->name('create-post');
    Route::post('/save', [PostController::class, 'savePost'])->name('save-post');
    Route::get('/status', [PostController::class, 'pendingView'])->name('status');
    Route::get('/edit', [PostController::class, 'postView'])->name('user-post');
    Route::put('/user-update-post/{id}', [PostController::class, 'updatePost'])->name('update-post');
    Route::get('/user/personal', [UserController::class, 'viewAllUserPost'])->name('personal-dashboard');
    Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
});




