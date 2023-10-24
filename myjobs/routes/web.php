<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', Postcontroller::class)->names([
    'index'=> 'posts.index',
    'create'=> 'posts.create',
    'store'=> 'posts.store',
    'show'=> 'posts.show',
]);

Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
Route::get('posts/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('posts.edit');
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');


// Route::get('dashboard', [CustomAuthController::class, 'index']); 
Route::get('login', [CustomAuthController::class, 'login'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
