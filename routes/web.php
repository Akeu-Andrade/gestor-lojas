<?php

use App\Http\Controllers\Web\Produto\CategoriaController;
use App\Http\Controllers\Web\Produto\ProdutoController;
use App\Modules\Module;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\Web\Home\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\Web\Home\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

    Route::resource('produto', ProdutoController::class);
    Route::resource('categoria', CategoriaController::class);

//    Route::get('categoria', 'App\Http\Controllers\Web\Produto\CategoriaController@index')->name('categoria');
//    Route::delete('categoria/{categoria}', 'App\Http\Controllers\Web\Produto\CategoriaController@destroy')->name('categoria.destroy');
//    Route::post('categoria/create', 'App\Http\Controllers\Web\Produto\CategoriaController@create')->name('categoria.create');

    Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

