<?php

//use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
Route::post('/user/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('user');
Route::post('/userupdate/{id}', [App\Http\Controllers\HomeController::class, 'update']);

Route::get('/adminmanage', [App\Http\Controllers\HomeAdminController::class, 'index']);
Route::get('/adminmanagecreate', [App\Http\Controllers\HomeAdminController::class, 'create']);
Route::post('/adminmanagecreate', [App\Http\Controllers\HomeAdminController::class, 'store']);
Route::get('/editadmin/{id}', [App\Http\Controllers\HomeAdminController::class, 'edit']);
Route::post('/editadmin/{id}', [App\Http\Controllers\HomeAdminController::class, 'edit'])->name('editadmin');
Route::post('/updateadmin/{id}', [App\Http\Controllers\HomeAdminController::class, 'update'])->name('updateadmin');
Route::delete('/deleteadmin/{id}', [App\Http\Controllers\HomeAdminController::class, 'destroy']);

Route::get('/usermanage', [App\Http\Controllers\HomeUserController::class, 'index']);
Route::get('/usermanagecreate', [App\Http\Controllers\HomeUserController::class, 'create']);
Route::post('/usermanagecreate', [App\Http\Controllers\HomeUserController::class, 'store']);
Route::get('/edituser/{id}', [App\Http\Controllers\HomeUserController::class, 'edit']);
Route::post('/edituser/{id}', [App\Http\Controllers\HomeUserController::class, 'edit'])->name('editadmin');
Route::post('/updateuser/{id}', [App\Http\Controllers\HomeUserController::class, 'update'])->name('updateadmin');
Route::delete('/deleteuser/{id}', [App\Http\Controllers\HomeUserController::class, 'destroy']);


