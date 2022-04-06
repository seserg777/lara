<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::name('user.')->group(function(){
   Route::view('/private', 'private')->middleware('auth')->name('private');

   Route::get('/login', function(){
      if(Auth::check()){
          return redirect(route('user.private'));
      }
      return view('user.login');
   })->name('login');

   Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

   Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
   })->name('logout');

   /*Route::get('/registration', function(){
       if(Auth::check()){
           return redirect(route('user.private'));
       }
       return view('registration');
   })->name('registration');*/

    Route::get('/registration', '\App\Http\Controllers\Common\UserController@registration')->name('registration');
    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);


    Route::get('/users/detail/{id}', [\App\Http\Controllers\Common\UserController::class, 'show'])->name('detail');
    Route::get('/users/detail/{id}/edit', '\App\Http\Controllers\Common\UserController@edit')->name('edit');
    Route::post('/users/detail/{id}/edit', [\App\Http\Controllers\Common\UserController::class, 'update']);
    Route::get('/users', '\App\Http\Controllers\Common\UserController@index')->name('index');
});
