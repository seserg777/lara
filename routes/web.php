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
})->name('homepage');

Route::name('user.')->group(function(){
   Route::view('/private', 'private')->middleware('auth')->name('private');

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

    //Route::post('/users/{id}', '\App\Http\Controllers\Common\UserController@update')->name('update');


    Route::resource(
        '/users/roles',
        \App\Http\Controllers\Common\RoleController::class,
        [
            'names' => [
                'index' => 'role.index',
                'store' => 'role.store',
                'create' => 'role.create',
                'edit' => 'role.edit',
                'update' => 'role.update',
                'delete' => 'role.delete'
            ]
        ]
    );
});

Route::get('login', function(){
    if(Auth::check()){
        return redirect(route('user.private'));
    }
    return view('user.login');
})->name('login');

Route::resource(
    'user',
    \App\Http\Controllers\Common\UserController::class,
    [
        'only' => [
            'index',
            'show',
            'edit',
            'update',
            'create',
        ],
    ]
);
