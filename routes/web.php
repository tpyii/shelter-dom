<?php

use App\Http\Controllers\Admin\BreedController AS AdminBreedController;
use App\Http\Controllers\CatalogController;
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

Route::get('/catalog', [CatalogController::class, 'index'])
    ->name('catalog.index');

Route::get('/catalog/{id}', [CatalogController::class, 'show'])
    ->where('id', '\d+')
    ->name('catalog.show');

/*
 * Тут все роуты для андминки
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::resource('/breeds', AdminBreedController::class);
});
