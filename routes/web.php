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

Route::group(['namespace' => 'App\Http\Controllers'], function (){
    Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);
});

Route::redirect('/', 'login');

Route::middleware(['middleware' => 'auth'])->group(function() {
    foreach (config('modules') as $module) {
        /**
         * @var Module $objModule
         */
        $objModule = new $module();

        $objModule->routeWeb();
    }
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

