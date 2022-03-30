<?php

use App\Http\Controllers\Admin\AnimalController AS AdminAnimalController;
use App\Http\Controllers\Admin\BreedController AS AdminBreedController;
use App\Http\Controllers\Admin\DiseaseController AS AdminDiseaseController;
use App\Http\Controllers\Admin\InoculationController AS AdminInoculationController;
use App\Http\Controllers\Admin\TypeController AS AdminTypeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\TestImgUploadController;
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
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('/breeds', AdminBreedController::class);
    Route::resource('/animal_types', AdminTypeController::class);
    Route::resource('/diseases', AdminDiseaseController::class);
    Route::resource('/inoculations', AdminInoculationController::class);
    Route::resource('/animals', AdminAnimalController::class);
    Route::resource('/img', TestImgUploadController::class);
});


// Тестовый роут для картинок
//Route::resource('/img', \App\Http\Controllers\TestImgUploadController::class);
