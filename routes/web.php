<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
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

Route::get('/', [FirstController::class, "index"]);

Route::get('/about', [FirstController::class, "about"]);

Route::get('/article/{id}', [FirstController::class, "article"])->where("id", "[0-9]+");

Route::get('/songs/create', [FirstController::class, "create"])->middleware('auth');
Route::post('/songs',[FirstController::class,"store"])->middleware('auth');
Route::get('/changeLike/{id}',[FirstController::class,"changeLike"])->middleware('auth')->where("id", "[0-9]+");

Route::get('/user/{id}', [FirstController::class,"user"])->where("id", "[0-9]+");
Route::get('/changeFollow/{id}',[FirstController::class,"changeFollow"])->middleware('auth')->where("id", "[0-9]+");

Route::get('/search/{search}',[FirstController::class,"search"]);

/* Route::name('language')->get('language/{lang}', 'FirstController@language'); */

Auth::routes();
